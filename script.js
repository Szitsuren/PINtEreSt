function logIn(){
    const a=document.getElementById('login-container');
    a.style.display = 'block';
    if (a.style.display=='block'){
        const background=document.getElementById('gray');
        background.style.display = 'block';
        background.addEventListener('click', unset);
        function unset(){
            a.style.display = 'none';
            background.style.display = 'none';
        }
    }
}

function register(){
    const a=document.getElementById('register-container');
    a.style.display = 'block';
    if (a.style.display == 'block'){
        const background=document.getElementById('gray');
        background.style.display = 'block';
        background.addEventListener('click', unset);
        function unset(){
            a.style.display = 'none';
            background.style.display = 'none';
        }
    }
}