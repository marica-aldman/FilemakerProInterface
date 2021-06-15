function formSwitchSimple() {
    document.cookie = "formType=simple;";
    location.reload();
}

function formSwitchAdvanced() {
    document.cookie = "formType=advanced;";
    location.reload();
}

function changeToList() {
    z = document.getElementById("searchSection");
    z.classList.add('searchSectionList');
    z.classList.remove('searchSectionCard');
    x = document.getElementByClassName("searchCard");
    x.forEach(setToList());
}

function changeToCard() {
    z = document.getElementById("searchSection");
    z.classList.remove('searchSectionList');
    z.classList.add('searchSectionCard');
    x = document.getElementByClassName("searchList");
    x.forEach(setToCard());
}

function setToList(y) {
    y.className -= "searchCard";
    y.className += "searchList";
    document.cookie = "searchDisplay=list;";
}

function setToCard(y) {
    y.className += "searchCard";
    y.className -= "searchList";
    document.cookie = "searchDisplay=card;";
}