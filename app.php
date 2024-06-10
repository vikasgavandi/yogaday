<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Get the user ID and username from the session
$id = $_SESSION['id'];
$username = $_SESSION['username'];



// Display the user's ID and username (for demonstration purposes)
echo "User ID: " . $id . "<br>";
echo "Username: " . $username . "<br>";

// You can add more functionality here as needed, such as displaying the user's score
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoga Day</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Top logo -->
        <div class="text-center my-4">
            <img src="./assets/brandlogo.png" alt="Yoga Day Logo" class="logo">
        </div>

        <!-- Fieldsets for the multi-step form -->
        <form>
            <div class="fieldset active" id="fieldset1">
                <h2>Please choose the pose you want to find.</h2>
                <!-- 6 Cards in a responsive 2 x 3 grid -->
                <div class="row justify-content-center mt-5">
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Cobra Pose (Bhujangasana)">
                            <img src="./assets/Cobra Pose.png" class="card-img-top" alt="Cobra Pose (Bhujangasana)">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Downward Facing Dog Pose (Adho Mukha Svanasana)">
                            <img src="./assets/Downward facing dog pose.png" class="card-img-top" alt="Downward Facing Dog Pose (Adho Mukha Svanasana)">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Lion Pose (Singhasana)">
                            <img src="./assets/Lion pose (Singhasana).png" class="card-img-top" alt="Lion Pose (Singhasana)">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Child’s Pose (Balasana)">
                            <img src="./assets/Child’s Pose (Balasana).png" class="card-img-top" alt="Child’s Pose (Balasana)">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Cat-Cow Pose (Chakravakasana)">
                            <img src="./assets/Cat-Cow Pose (Chakravakasana).png" class="card-img-top" alt="Cat-Cow Pose (Chakravakasana)">
                        </div>
                    </div>
                    <div class="col-6 col-md-2 mb-4">
                        <div class="card" data-target="fieldset2" data-pose="Yogic Sleep (Yoga Nidra)">
                            <img src="./assets/Yogic sleep (Yoga Nidra) .png" class="card-img-top" alt="Yogic Sleep (Yoga Nidra)">
                        </div>
                    </div>
                </div>
            </div>


            <div id="chancesLeft"></div>

            <div class="fieldset" id="fieldset2">
                <h2>Find the Pose from below shuffled options</h2>
                <!-- 6 Cards in a responsive 2 x 3 grid -->
                <div class="row justify-content-center mt-5 " id="card_holder">
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Cobra Pose (Bhujangasana)" name="Cobra Pose (Bhujangasana)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Cobra Pose (Bhujangasana)">
                        </div>
                    
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Downward Facing Dog Pose (Adho Mukha Svanasana)" name="Downward Facing Dog Pose (Adho Mukha Svanasana)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Downward Facing Dog Pose (Adho Mukha Svanasana)">
                        </div>
                    
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Lion Pose (Singhasana)" name="Lion Pose (Singhasana)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Lion Pose (Singhasana)">
                        </div>
                     
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Child’s Pose (Balasana)" name="Child’s Pose (Balasana)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Child’s Pose (Balasana)">
                        </div>
                     
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Cat-Cow Pose (Chakravakasana)" name="Cat-Cow Pose (Chakravakasana)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Cat-Cow Pose (Chakravakasana)">
                        </div>
                     
                    
                        <div class="card col-6 col-md-2 mb-4" data-target="fieldset3" data-pose="Yogic Sleep (Yoga Nidra)" name="Yogic Sleep (Yoga Nidra)">
                            <img src="./assets/cardBackground.png" class="card-img-top" alt="Yogic Sleep (Yoga Nidra)">
                        </div>
                     
                </div>
            </div>

            <div class="fieldset" id="fieldset3">
                <h2>Result</h2>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary next" data-target="fieldset4">Next</button>
                </div>
            </div>

            <div class="fieldset text-center" id="fieldset4">
                <!-- <h2>Next Steps</h2> -->
                <div class="pose-details">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <img id="poseImage" src="" alt="Yoga Pose Image" class="pose-image img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="pose-info">
                                <h3 id="poseName" class="mb-4"></h3>
                                <p id="poseBenefits"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary next" data-target="fieldset5">Next</button>
                </div>
            </div>
            

            <div class="fieldset" id="fieldset5">
                <h2>Submit</h2>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success" data-target="fieldset6">Submit</button>
                </div>
            </div>

         </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const maxPlays = 5;
    const playsLeftKey = 'playsLeft';

    function getPlaysLeft() {
        return localStorage.getItem(playsLeftKey) ? parseInt(localStorage.getItem(playsLeftKey)) : maxPlays;
    }

    function updatePlaysLeft(playsLeft) {
        localStorage.setItem(playsLeftKey, playsLeft);
        document.getElementById('chancesLeft').innerText = `You have ${playsLeft} chances left.`;
    }

    function checkPlaysLeft() {
        const playsLeft = getPlaysLeft();
        if (playsLeft <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have reached the maximum number of plays allowed.',
            });
            return false;
        }
        return true;
    }

    function decreasePlaysLeft() {
        let playsLeft = getPlaysLeft();
        playsLeft--;
        updatePlaysLeft(playsLeft);
    }

    // Initialize plays left on page load
    updatePlaysLeft(getPlaysLeft());

    // Add event listener to the form submission or game completion
    document.querySelector('form').addEventListener('submit', function(event) {
        // event.preventDefault(); // Prevent form submission for demonstration purposes
        if (checkPlaysLeft()) {
            // Simulate game completion
            decreasePlaysLeft();
            // Continue with form submission or game logic
            // For example: this.submit();
            Swal.fire('Good job!', 'You have completed a game.', 'success');
        }
    });

    // Add event listener to the start game button
    document.querySelectorAll('.card[data-target="fieldset2"]').forEach(card => {
        card.addEventListener('click', function() {
            if (!checkPlaysLeft()) {
                return;
            }
            // Continue with the logic to start the game
            document.getElementById('fieldset1').classList.remove('active');
            document.getElementById('fieldset2').classList.add('active');
        });
    });
});

    </script>

    <!-- jQuery, Bootstrap JS and SweetAlert2 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom JS -->
    <!-- <script src="script.js"></script> -->
</body>

</html>




<?php
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Get the user ID and username from the session
$id = $_SESSION['id'];
$username = $_SESSION['username'];

// Database connection parameters
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "alcare";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch sample data from the database
$sql = "SELECT id, username, score, created_at FROM users";
$result = $conn->query($sql);

$sampleData = [];
if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sampleData[] = $row;
        }
    } else {
        echo "No data found";
    }
}
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            const nextButtons = document.querySelectorAll('.next');
            const alertBox = document.createElement('div');
            alertBox.className = 'alert-box';
            document.body.appendChild(alertBox);

            let chosenCard = null; // Variable to store the chosen card from fieldset1
            let score = 0; // Variable to store the score
            let chances = 5; // Variable to store the remaining chances

            // Replace sampleData with data fetched from the server
            const sampleData = <?php echo json_encode($sampleData); ?>;

            // Function to handle the next button click event
            const yogaPoses = [
                {
                    poseimage: "./assets/Cobra Pose.png",
                    posename: "Cobra Pose (Bhujangasana)",
                    benefits: "Strengthens the spine, opens the chest, and improves posture."
                },
                {
                    poseimage: "./assets/Downward facing dog pose.png",
                    posename: "Downward Facing Dog Pose (Adho Mukha Svanasana)",
                    benefits: "Stretches the hamstrings, calves, and hands. Strengthens the arms and legs."
                },
                {
                    poseimage: "./assets/Lion pose (Singhasana).png",
                    posename: "Lion Pose (Singhasana)",
                    benefits: "Relieves tension in the face and chest. Stimulates the throat and neck."
                },
                {
                    poseimage: "./assets/Child’s Pose (Balasana).png",
                    posename: "Child’s Pose (Balasana)",
                    benefits: "Stretches the hips, thighs, and ankles. Calms the mind and relieves stress."
                },
                {
                    poseimage: "./assets/Cat-Cow Pose (Chakravakasana).png",
                    posename: "Cat-Cow Pose (Chakravakasana)",
                    benefits: "Improves spinal flexibility. Massages the spine and internal organs."
                },
                {
                    poseimage: "./assets/Yogic sleep (Yoga Nidra) .png",
                    posename: "Yogic Sleep (Yoga Nidra)",
                    benefits: "Promotes deep relaxation and stress relief. Enhances self-awareness."
                }
            ];

            function showAlert(message, type, selectedCardImage) {
                alertBox.textContent = message;
                alertBox.className = `alert-box ${type}`;
                alertBox.style.display = 'block';
                
                // Create an image element for the selected card
                const cardImage = document.createElement('img');
                cardImage.src = selectedCardImage;
                cardImage.style.width = '50px'; // Adjust image width as needed
                
                // Append the card image to the alert box
                alertBox.appendChild(cardImage);
                
                setTimeout(() => {
                    alertBox.style.display = 'none';
                    alertBox.innerHTML = ''; // Clear the alert box content
                }, 2000);
            }

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    if (this.closest('#fieldset1')) {
                        if (chosenCard) {
                            chosenCard.classList.remove('highlighted'); // Remove highlight from previously chosen card
                        }
                        chosenCard = this; // Store the chosen card element
                        chosenCard.classList.add('highlighted'); // Add highlight to the chosen card
                    } else if (this.closest('#fieldset2')) {
                        const selectedCard = this.querySelector('img').alt;
                        const highlightedFlippedCard = document.querySelector('.card.highlighted.flipped[data-target="fieldset2"]');
                        const dataPoseValue = highlightedFlippedCard.getAttribute('data-pose');
                        
                        if (chosenCard.querySelector('img').alt === selectedCard) {
                            score += 10; // Award points for the correct match
                            updateScore(score); // Update the score in the database
                            showAlert('Great! You have chosen the right pose. +10 points', 'success', chosenCard.querySelector('img').src);
                        } else {
                            showAlert('Oops! You have chosen the wrong pose. ' + dataPoseValue, 'error');
                        }
                    }

                    this.classList.toggle('flipped');
                    setTimeout(() => {
                        const target = this.getAttribute('data-target');
                        document.querySelector('.fieldset.active').classList.remove('active');
                        document.getElementById(target).classList.add('active');
                    }, 600); // Match this duration with the CSS transition time
                });
            });


            nextButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const target = this.getAttribute('data-target');
                    document.querySelector('.fieldset.active').classList.remove('active');
                    document.getElementById(target).classList.add('active');
                });
            });

            function populateScoreTable(data) {
                const tableBody = document.getElementById('scoreTableBody');
                tableBody.innerHTML = '';

                data.sort((a, b) => b.score - a.score);

                data.forEach((item, index) => {
                    const row = `
                        <tr class="${index < 3 ? 'highlight' : ''}">
                            <td>${item.id}</td>
                            <td>${item.username}</td>
                            <td>${item.score}</td>
                            <td>${item.count}</td>
                            <td>${item.created_at}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            }

            function displayFinalScore() {
                const finalScoreContainer = document.getElementById('finalScoreContainer');
                finalScoreContainer.textContent = `Your Final Score: ${score} points`;
            }

            populateScoreTable(sampleData);
            
            function displayChosenPose(poseName) {
                const chosenPose = yogaPoses.find(pose => pose.posename === poseName);
                if (chosenPose) {
                    document.getElementById('poseImage').src = chosenPose.poseimage;
                    document.getElementById('poseName').textContent = chosenPose.posename;
                    document.getElementById('poseBenefits').textContent = chosenPose.benefits;
                }
            }

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    const poseName = this.getAttribute('data-pose');
                    displayChosenPose(poseName);
                });
            });
        });

        function shuffleCards() {
            const fieldset2 = document.getElementById('fieldset2');
            const card_holder = document.getElementById('card_holder');
            const cards = Array.from(fieldset2.querySelectorAll('.card'));

            const animationDuration = 1000; // Duration of the animation in milliseconds
            const interval = animationDuration / cards.length; // Calculate the interval for each card

            const shuffledCards = [...cards].sort(() => Math.random() - 0.5);

            shuffledCards.forEach((card, index) => {
                setTimeout(() => {
                    card_holder.appendChild(card);
                }, index * interval);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            shuffleCards();
        });

        function updateScore(score) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_score.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Score updated successfully');
                }
            };
            xhr.send('score=' + score + '&id=<?php echo $id; ?>');
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="text-center my-4">
            <img src="./assets/brandlogo.png" alt="Yoga Day Logo" class="logo">
        </div>
        <div class="fieldset active" id="fieldset1">
            <!-- Fieldset 1 Content -->
        </div>
        <div class="fieldset" id="fieldset2">
            <div id="card_holder">
                <!-- Cards for fieldset 2 will be dynamically added here -->
            </div>
        </div>
        <div id="scoreTableContainer">
            <table id="scoreTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Score</th>
                        <th>Count</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody id="scoreTableBody"></tbody>
            </table>
        </div>
        <div id="finalScoreContainer"></div>
    </div>
</body>
</html>
