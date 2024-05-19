function showHint(str) {
  let text = document.getElementById("txtHint");
  if (str.length == 0) {
    text.innerText = "";
    return;
  }

  xhttp = new XMLHttpRequest();

  //Code 4b
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //   Typical action to be performed when the document is ready:
      let res = JSON.parse(xhttp.responseText);
      let output = res
        .map(function (e) {
          return e.name;
        })
        .join(", ");
      text.innerText = output;
    }
  };

  xhttp.open("GET", "page11B_gethint.php?keyword=" + str, true);
  xhttp.send();
}
