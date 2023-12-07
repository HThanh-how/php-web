<!DOCTYPE html>

<html
 
lang="en">

<head>

  
<meta
 
charset="UTF-8">

  
<meta
 
name="viewport"
 
content="width=device-width, initial-scale=1.0">

  
<title>Read Text File</title>
  <script >


function getFileContent() {
  // Create a new XMLHttpRequest object
var xhr = new XMLHttpRequest();

// Define the URL of the text file
var url = "https://filesamples.com/samples/document/txt/sample1.txt";

// Open a GET request to the URL
xhr.open("GET", url, true);

// Set the response type to text
xhr.responseType = "text";

// Define what to do when the request is successful
xhr.onload = function() {
  // Check if the status code is 200 (OK)
  if (xhr.status === 200) {
    // Get the response text
    var text = xhr.responseText;
    console.log(text);
    // Display the text in an HTML element
    document.getElementById("output").innerHTML = text;
  }
};

// Send the request
xhr.send();

}

  </script>
</head>
<body>
  <h1 id="output"></h1>
  <button onclick="getFileContent()">Read File</button>
</body>
</html>