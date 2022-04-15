//Toggle Menu
var MenuItems = document.getElementById("MenuItems")
MenuItems.style.maxHeight = "0px"


let menuButton = document.querySelector('.fa-bars')
menuButton.onclick = () =>{
   if(MenuItems.style.maxHeight == "0px"){
       MenuItems.style.maxHeight = "200px"
       
   }else{
       MenuItems.style.maxHeight = "0px"
   }
}

//1. describe and create / initiate an object
addSearchHTML();
var openButton = document.querySelector(".fa-search");
var closeButton = document.querySelector(".fa-window-close");
var searchOverlay = document.querySelector(".search-overlay");
var searchField = document.querySelector("#search-term");
var resultsDiv = document.querySelector("#search-overlay__results");
var textInput = document.querySelectorAll('input , textarea');
const objRef = document.body;
let isOverlayOpen = false;
let isSpinnerVisible = false;

//2. Events
openButton.onclick = () => openOverlay();
closeButton.onclick = () => closeOverlay();
document.addEventListener('keydown', keyPressDispatcher);
searchField.addEventListener('keyup', () => typingLogic.setup() );


//3. Methods (function, action....)
function openOverlay() {
    searchOverlay.classList.add('search-overlay--active');
    objRef.classList.add('body-no-scroll');
    searchField.value ="";
    setTimeout(() => searchField.focus(), 301);
    console.log('Our openOverlay just ran');
    isOverlayOpen = true;
    return false;
}

function closeOverlay() {
    searchOverlay.classList.remove('search-overlay--active');
    objRef.classList.remove('body-no-scroll');
    console.log('Our closeOverlay just ran');
    isOverlayOpen = false;
}

function addSearchHTML() {
  const overlayDiv = document.createElement("div");
  overlayDiv.classList.add("search-overlay");
  overlayDiv.innerHTML = `
  <div class="search-overlay_top">
    <div class="search-field">
        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
        <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
    </div>
  </div>

  <div class="small-container">
    <div id="search-overlay__results">
      <div class="row">
        <div class="one-third"></div>
        <div class="one-third"></div>
        <div class="one-third"></div>  
      </div>
    </div>
  </div>
  `;
  document.body.append(overlayDiv);

}

function keyPressDispatcher(e) {
  if(e.keyCode == 83 && !isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
    openOverlay();
  }
  if(e.keyCode == 27 && isOverlayOpen) {
    closeOverlay();
  }
}

async function fetchResults() {
  this.remind();
  try {
    // after this line, our function will wait for the `fetch()` call to be settled
    // the `fetch()` call will either return a Response or throw an error
    const response = await fetch(extremeData.root_url +"/wp-json/extremechem/v1/finder?term=" + searchField.value);
    if (!response.ok) {
      throw new Error(`HTTP error: ${response.status}`);
    }
    // after this line, our function will wait for the `response.json()` call to be settled
    // the `response.json()` call will either return the JSON object or throw an error
    const results = await response.json();
    console.log(results);

    resultsDiv.innerHTML = `
      <div class="row">
        <div class="one-third">
          <h3 class="search-overlay__section-title"> General Information</h3>
          ${results.generalInfo.length ? '<ul>' :'<p>No general information matches that search.</p>'}
            ${results.generalInfo.map(item =>`<li class="link-list"><a href="${item.permalink}">${item.title}<a/> ${item.postType == 'post' ? ` by ${item.authorName}` : ''}</li>`).join('')}
          ${results.generalInfo.length ? '</ul>' : ''}
        </div>
        <div class="one-third">
          <h3 class="search-overlay__section-title"> Products</h3>
          ${results.products.length ? '<ul>' :`<p>No products match that search.</p> <a href="${extremeData.root_url}/products">View all products.</a>`}
            ${results.products.map(item =>`
            <li class="link-list"><a href="${item.permalink}">${item.title}<a/></li>
            <a href="${item.permalink}"><img class="professor-card__image" src="${item.image}"></a>
            `).join('')}
          ${results.products.length ? '</ul>' : ''}
        </div>
        <div class="one-third">
          <h3 class="search-overlay__section-title"> Services</h3>
          ${results.services.length ? '<ul>' :`<p>No services match that search.</p> <a href="${extremeData.root_url}/services">View all services.</a>`}
            ${results.services.map(item =>`<li class="link-list"><a href="${item.permalink}">${item.title}<a/></li>`).join('')}
          ${results.services.length ? '</ul>' : ''}
        </div>
      </div>
    `;
    isSpinnerVisible = false;
  }

  catch(error) {
    console.error(`Could not get results: ${error}`);
  }
  
}

function spinnerLoader (){
  resultsDiv.innerHTML = '<div class="spinner"><div></div><div></div></div>';
  isSpinnerVisible = true;
}

const typingLogic = {
  remind: function() {
    this.timeoutID = undefined;
    this.theText;  
  },

  setup: function() {
    if (typeof this.timeoutID === 'number') {
      this.cancel();
    }
    
    if(searchField.value != this.theText) {
      this.cancel();

      if(searchField.value) { 
        if(!isSpinnerVisible) {
          spinnerLoader();
        }
        this.timeoutID = setTimeout(fetchResults.bind(this), 750);

      } else {
        resultsDiv.innerHTML = '';
        isSpinnerVisible = false;
      }
    }

    this.theText = searchField.value;
  },

  cancel: function() {
    clearTimeout(this.timeoutID);
  }
}; 


