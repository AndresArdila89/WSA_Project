function handleError(error)
{
    alert("An error occured in the Javascript code: " + error);
}

function search()
{
    
    try
    {
        //xml http request

        let xhr = new XMLHttpRequest();

        // need to use GET or SET Method to replace the form with JS code.
        // tell which page to call 
        xhr.open("POST","PHP/purchases_table.php");

        // specify that I am not sending binary data
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        const textDate = document.getElementById('search').value;

        // Callback function 

        xhr.onreadystatechange = function()
        {
            // 0 = unitialized
            // 1 = loading
            // 2 = loaded
            // 3 = interactive
            // 4 = complete

            if(xhr.readyState ==4 && xhr.status == 200)
            {
                document.getElementById('purchases_table').innerHTML = xhr.responseText;
            }
        }

        xhr.send("date=" + textDate);
    }
    catch(myError)
    {
        handleError(myError);
    }
}

function deletePurchase(id)
{
    
    try
    {
        //xml http request

        let xhr = new XMLHttpRequest();

        // need to use GET or SET Method to replace the form with JS code.
        // tell which page to call 
        xhr.open("POST","PHP/purchases_table.php");

        // specify that I am not sending binary data
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        // Callback function 

        xhr.onreadystatechange = function()
        {
            if(xhr.readyState ==4 && xhr.status == 200)
            {
                // this code is used to prevent a request to the database to call all the purchases again 
                // insted the row is deleted with JS that way the only needed querty is DELETE
        
                let row = id.parentNode.parentNode.rowIndex;
                document.getElementById('purchases_table').deleteRow(row);
            }
        }
        
        xhr.send("deleteRow=" + id.value);
    }
    catch(myError)
    {
        handleError(myError);
    }
}