import os
from google.oauth2.credentials import Credentials
from google.auth.transport.requests import Request
from google_auth_oauthlib.flow import InstalledAppFlow
from googleapiclient.discovery import build
from googleapiclient.errors import HttpError
from googleapiclient.http import MediaFileUpload
from flask import Flask, jsonify, request
import logging
import sys

logging.basicConfig(level=logging.DEBUG)

# Replace with the ID of your folder in Google Drive
folder_id = '1gg7xzkQTBe-7qccd_EL3H2HNFGQKNG8Z'

# Define the scopes for the Drive API
SCOPES = ['https://www.googleapis.com/auth/drive']

# Define the path to the credentials file
creds_file = 'token.json'

# Define the Flask app
app = Flask(__name__)

@app.route('/upload', methods=['POST'])
def upload():
    # Get the file path from the request body
    file_path = request.json['file_path']
    logging.debug('File path: %s', file_path)

    # Authenticate with the Google Drive API
    creds = None
    if os.path.exists(creds_file):
        creds = Credentials.from_authorized_user_file(creds_file, SCOPES)

    if not creds or not creds.valid:
        if creds and creds.expired and creds.refresh_token:
            creds.refresh(Request())
        else:
            flow = InstalledAppFlow.from_client_secrets_file(
                'cr.json', SCOPES)
            creds = flow.run_local_server(port=0)
        with open(creds_file, 'w') as token:
            token.write(creds.to_json())

    # Build the Drive API client
    service = build('drive', 'v3', credentials=creds)

    # Create file metadata
    file_metadata = {
        'name': os.path.basename(file_path),
        'parents': [folder_id]
    }

    # Use the client to upload the file to Drive
    media = MediaFileUpload(file_path, mimetype='application/octet-stream')
    file = service.files().create(body=file_metadata, media_body=media, fields='id,webViewLink').execute()

    # Set sharing permissions
    permission = service.permissions().create(
        fileId=file['id'],
        body={
            'type': 'anyone',
            'role': 'reader',
            'allowFileDiscovery': False,
            'sendNotificationEmail': False
        }
    ).execute()

    # Return the ID and URL of the uploaded file
    return file['id']

if __name__ == '__main__':
    app.run(port=8000)