function formSwitchSimple() {
    document.cookie = "formType=simple;";
    location.reload();
}

function formSwitchAdvanced() {
    document.cookie = "formType=advanced;";
    location.reload();
}

function switchCardList() {
    z = document.getElementById("searchSection");
    x = z.classList[0]; 
    if (x == "searchSectionList") {
        z.classList.remove('searchSectionList');
        z.classList.add('searchSectionCard');
        document.cookie = "searchDisplay=card;";
    } else {
        z.classList.add('searchSectionList');
        z.classList.remove('searchSectionCard');
        document.cookie = "searchDisplay=list;";
    }
}

function openHamburger() {
    var x = document.getElementById("hamburger");
    x.style.display = "none";
    var y = document.getElementById("closeHamburger");
    y.style.display = "flex";
    var z = document.getElementById("mainNavigation");
    z.style.display = "block";
}


function closeHamburger() {
    var x = document.getElementById("hamburger");
    x.style.display = "block";
    var y = document.getElementById("closeHamburger");
    y.style.display = "none";
    var z = document.getElementById("mainNavigation");
    z.style.display = "none";
}

function openSource(source){
    var x = document.getElementById("source");
    x.classList.remove("sourceHide");
    var y = document.getElementById("sourceImg");
    var sourceLink = "source/img/" + source;
    searchInputSwe.setAttribute("src", sourceLink );
}

function closeSource(source){
    var x = document.getElementById("source");
    x.classList.add("sourceHide");
}