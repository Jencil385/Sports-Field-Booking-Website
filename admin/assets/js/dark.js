function applyInitialTheme () {
    const theme = window.localStorage.getItem("site-theme");
    
    
    if (theme !== null) {
        if(theme=="dark")
        document.getElementById("dark-mode").checked = true;
        if(theme=="light")
            document.getElementById("dark-mode").checked = false;
    }
}

applyInitialTheme();


function goDark(theme) {
    if (theme === "dark") {
        let links = document.getElementsByTagName('link');
        for (let i = 0; i < links.length; i++) { 
                if (links[i].getAttribute('id') == 'light') {     
                    let newHref = "assets/css/theme-dark.css"; 
                    links[i].setAttribute('href', newHref); 
                     window.localStorage.setItem("site-theme", "dark");
                } 
            } 
 
    } else if (theme === "light") {
        let links = document.getElementsByTagName('link');
        for (let i = 0; i < links.length; i++) { 
                if (links[i].getAttribute('id') == 'light') {                     
                    let newHref = "assets/css/theme.css";   
                    links[i].setAttribute('href', newHref); 
                     window.localStorage.setItem("site-theme", "light");
                } 
            } 
    }
}