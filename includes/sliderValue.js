// display value of range input
function sliderValue(currentValue, currentName) {
  if (currentName == "frontCamber" || currentName == "rearCamber" || currentName == "frontToe" || currentName == "rearToe") {
    currentValue = parseFloat(currentValue);
    currentValue = currentValue.toFixed(2);
  }
  else if (currentName == "frontLeftPressure" || currentName == "frontRightPressure" || currentName == "rearLeftPressure" || currentName == "rearRightPressure") {
    currentValue = parseFloat(currentValue);
    currentValue = currentValue.toFixed(1);
  }
  document.getElementById(currentName).innerText=currentValue;
}