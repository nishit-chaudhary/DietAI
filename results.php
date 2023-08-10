<!-- fetch request post -->

<?php
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $veg = $_POST['veg'];
    $response = $_POST['response'];
    fetch('http//127.0.0.1:5000', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            height: $height,
            weight: $weight,
            age: $age,
            veg: $veg,
            response: $response
        })
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(err => console.log(err))


?>