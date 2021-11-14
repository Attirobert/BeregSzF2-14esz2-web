function getXmlHttp() {
    var xmlhttp = null;

    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        // hibakezelés
    }
    return xmlhttp;
}