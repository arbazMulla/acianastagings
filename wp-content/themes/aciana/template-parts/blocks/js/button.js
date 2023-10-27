// Assuming you have a reference to the select element
// Assuming you have a reference to the select element
var selectElement = document.getElementById("acf-259eddd6-750a-4616-bd19-9343e6c26de7-field_653ba97f10c24");

// Add a class name to the select element
selectElement.classList.add("btnSelectfield");
// Get the selected value
var selectedValue = selectElement.value;


// Check if the selected value is "primary"
if (selectedValue === "primary") {
    // Do something when "primary" is selected
    console.log("Primary option is selected");
}
