<?php
/**
 * Series of exercises on PHP conditional structures.
*/  

// 1.1 Clean your room Exercise 

    $room_is_filthy = true;
    function cleanup_room() {
        echo "<br>Cleanup in progres...<br>";
    }

    if($room_is_filthy){
        echo "Yuk, Room is dirty : let's clean it up !";
        cleanup_room();
        echo "<br>Room is now clean!";
        $room_is_filthy = false;
    } else { 
        echo "<br>Nothing to do, room is neat.";
    }


    // 1.2 Clean your room Exercise, improved

// Create the array of possible states
$possible_states = ["health hazard", "filthy", "dirty", "clean", "immaculate"];

// When testing, change the index value to navigate to the possible array values
$room_filthiness = $possible_states[0]; 

if($room_filthiness == [0]){
	echo "Yuk, Room is Disgusting! Let's clean it up !";
} else if($room_filthiness == [1]){
	echo "Yuk, Room is dirty : let's clean it up !";
} else if($room_filthiness == [2]){
	echo "Better but dirty : let's clean it up !";
} else if($room_filthiness == [3]){
	echo "It's clean !";
} else {
	echo "<br>Perfection";
}