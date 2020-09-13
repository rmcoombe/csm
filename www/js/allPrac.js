//Initialising the connection with Backendless
Backendless.initApp('0B256F0F-9791-937D-FF66-C8FAAB3E8600', 'BA8410D6-25F5-44D9-8E28-100D07959744' );

//When everything is loaded listener
document.addEventListener("DOMContentLoaded", function() {
    getEntries();
});

//Retreiving the previously stored entries on backendless
function getEntries() {
   
    Backendless.Data.of("wheel").find().then(processResults).catch(error);

}

function processResults(entries) {
    
    for (var i = 0; i < entries.length; i++) {
		
		var table = document.getElementById("table");
		var row = table.insertRow(1);
		var cell1 = row.insertCell(0);
		cell1.innerHTML = entries[i].wheel_no;

		
    }
}

function error(error) {
   
}
