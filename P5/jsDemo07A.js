for (var ii = 4, jj = 3; jj >= 0; ii++, jj--) {
  document.writeln(ii + " * " + jj + " = " + (ii * jj).toFixed(3) + "<br>");
  document.writeln(ii + " / " + jj + " = " + (ii / jj).toFixed(3) + "<br>");
  document.writeln("log(" + jj + ") = " + Math.log(jj).toFixed(3) + "<br>");
  document.writeln("sqrt(" + (jj - 1) + ") = " + Math.sqrt(jj - 1).toFixed(3) + "<br><br>");
}
