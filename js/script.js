// //setting variables
// let theInput = document.querySelector(".newTask input"),
//     addButton = document.querySelector(".newTask .add"),
//     container =  document.querySelector(".content"),
//     counter = document.querySelector(".counter span"),
//     completed = document.querySelector(".completed span");


// //Input Field Focus
// window.onload = function ()
// {
//     theInput.focus();
// };

// //Adding new task
// addButton.onclick = function () 
// {
//     if (theInput.value === '')
//     { //If Empty make sweet alert

//         swal("Error!");
//     }
//     else
//     {
//         let empty = document.querySelector(".empty");

//         if (document.body.contains(empty))
//         {
//             empty.remove();
//         }
        

//         let mainSpan = document.createElement("span");          //create main span Element
//         let deleteElement = document.createElement("span");     // Create delete button
//         let text = document.createTextNode(theInput.value);     // Create main span text
//         let deleteText = document.createTextNode("Delete");     // Create delete button
       
//         mainSpan.appendChild(text);                             //Add Text to main span
//         mainSpan.className = "task";                            //Add class to main span
//         deleteElement.appendChild(deleteText);                  //Add Text to delete button
//         deleteElement.className = "delete";                     //Add class delete button
//         mainSpan.appendChild(deleteElement);                    //Add delete button to Main span
//         container.appendChild(mainSpan);                        //Add task to container
        
//         theInput.value = "";                                    //Empty the field
//         theInput.focus();   
//         taskCounter();                                    //Focus Again
//     }
// };

// document.addEventListener('click', function (e){
//     if (e.target.className == 'delete')
//     {
//         // console.log('this is');
//         //removing task
//         e.target.parentNode.remove();
//         localStorage.clearItem();
//         //check number of task
//         if(container.childElementCount == 0)
//         {
//             createNoTask();
//         }
//     }
//         //Finishing task
//     if (e.target.classList.contains('task'))
//     {
//         //togle class 'finished'
//         e.target.classList.toggle("finished");
//     }
//     taskCounter();
// });

// //Function to create no tasks

// function createNoTask()
// {
//     let msgSpan = document.createElement("span"), 
//         msgText = document.createTextNode("Add New Task");
        
//     msgSpan.appendChild(msgText);
//     msgSpan.className = 'empty';

//     container.appendChild(msgSpan);
// }

// function taskCounter()
// {
//     //All Tasks
//     counter.innerHTML = document.querySelectorAll('.content .task').length;
//     //Completed Tasks
//     completed.innerHTML = document.querySelectorAll('.content .finished').length;
// }


document.querySelector("span.add").addEventListener("click", () => {
    document.forms[0].submit();
})
let xhr;
document.getElementById("search").addEventListener("keyup", () => {
    let search = document.getElementById("search").value; //ahmed
    xhr = new XMLHttpRequest();
    console.log(xhr, "xhr");
    let data = "search=" + search; //search = p
    xhr.open("POST", "search.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
    // console.log(data);
    // console.log(xhr.responseText);
    // console.log(xhr.response)
    xhr.onreadystatechange = display_data;
    // console.log(xhr.response);
    function display_data() { 
        let tasks = document.querySelectorAll(".task");
        if(!document.getElementById("search").value == "")
        {
            for(it in tasks)
            {
                tasks[it].style.display = "none";
            }
        }
        else
        {
            for(it in tasks)
            {
                tasks[it].style.display = "block";
            }
        }
        let result = JSON.parse(xhr.response);
        for(it in result)
        {
            console.log(result[it].id);
            console.log(result[it].post);
        }
        console.log(result);
        // document.getElementById("suggestion").innerHTML = "test for test";//xhr.responseText;
    }
    
});



// const xhr = new XMLHttpRequest();
// xhr.onload = function() {
//     const serverResponse = document.getElementById("serverResponse");
//     serverResponse.innnerHTML = this.responseText;
// }

// xhr.open("POST", "search.php");
// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// xhr.send("name=domenic&message=how's it going");