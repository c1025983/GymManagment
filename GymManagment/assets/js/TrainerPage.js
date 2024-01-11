
function fetchWorkoutDescription() {
    var selectedMemberID = document.getElementById('memberSelect').value;
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                document.getElementById('workoutDescription').value = response.workoutDescription || '';
                document.getElementById('workoutDuration').value = response.workoutDuration || '';
                document.getElementById('workoutCalories').value = response.workoutCalories || '';
                document.getElementById('dietDescription').value = response.dietDescription || '';
                document.getElementById('calories').value = response.calories || '';
                document.getElementById('fats').value = response.fats || '';
                document.getElementById('carbs').value = response.carbs || '';
                document.getElementById('protein').value = response.protein || '';
                
            } else {
                console.error('Request failed: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', 'get_workout_details.php?memberID=' + selectedMemberID, true);
    xhr.send();
}

  
  //checks for drop down change
  document.getElementById('memberSelect').addEventListener('change', function() {
    fetchWorkoutDescription();
  });



  function updateWorkoutDescription() {
    var workoutDescription = document.getElementById('workoutDescription').value;
    var workoutCalories = document.getElementById('workoutCalories').value;
    var workoutDuration = document.getElementById('workoutDuration').value;
    
    var selectedMemberID = document.getElementById('memberSelect').value;
  
    //need to check a member was selected yet
    if (!selectedMemberID)
    {
        alert('Use the drop down menu to select a member first.');
        return;
    }
  
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert('Workout changed');
            } else {
                alert('something went wrong');
            }
        }
    };
    xhr.open('POST', 'update_workout_description.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('memberID=' + selectedMemberID + '&workoutDescription=' + encodeURIComponent(workoutDescription)
    + '&workoutDuration=' + workoutDuration + '&workoutCalories='+ workoutCalories);
  }



  function updateDietDescription() {
    
    var dietDescription = document.getElementById('dietDescription').value;
    var fatsText = document.getElementById('fats').value;
    var proteinText = document.getElementById('protein').value;
    var carbsText = document.getElementById('carbs').value;
    var caloriesText = document.getElementById('calories').value;
    var selectedMemberID = document.getElementById('memberSelect').value;
    
    var data = {
        memberID: selectedMemberID,
        dietDescription: dietDescription,
        caloriesText: caloriesText,
        carbsText: carbsText,
        proteinText: proteinText,
        fatsText: fatsText
    };
    
  

    // Make a POST request using the Fetch API
    fetch('update_diet_details.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // Set the content type to JSON
        },
        body: JSON.stringify(data), // Convert data to JSON format
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data);
        // Process the response here
    })
    .catch(error => {
        console.error('Error:', error);
    });
  }