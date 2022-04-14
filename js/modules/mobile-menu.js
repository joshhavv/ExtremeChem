//Toggle Menu

    var MenuItems = document.getElementById("MenuItems");
     MenuItems.style.maxHeight = "0px";


    let menuButton = document.querySelector('.fa-bars');
    menuButton.onclick = () =>{
        if(MenuItems.style.maxHeight == "0px"){
            MenuItems.style.maxHeight = "200px";
            MenuItems.style.marginTop = "62px"
        }else{
            MenuItems.style.maxHeight = "0px";
        }
    }



