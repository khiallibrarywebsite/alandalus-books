let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}


let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   search.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}
const colors = ['#07A5D1', '#DC5E60', '#0021f6', '#471F75', '#3A4F8E', '#9F418E'];

const elements = document.querySelectorAll('.footer span,*::selection,html::-webkit-scrollbar-thumb,.btn,.inline-btn,.side-bar .navbar a i,.home-grid .box-container .likes span,.about .box-container .box i,.playlist-details .row .column .save-playlist button:hover i,.watch-video .video-container .info i,.teachers .box-container .box p span,.teacher-profile .details .flex p span,.user-profile .info .box-container .box .flex span,.contact .box-container .box i');


// loop through the elements and set a random color for each one
elements.forEach((element) => {
  const randomIndex = Math.floor(Math.random() * colors.length);
  element.style.setProperty('--random-color', colors[randomIndex]);
  element.classList.add(`color-${randomIndex+1}`);
});



