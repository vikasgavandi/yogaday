document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');
    const nextButtons = document.querySelectorAll('.next');
    const form = document.querySelector('form');
    const alertBox = document.createElement('div');
    alertBox.className = 'alert-box';
    document.body.appendChild(alertBox);

    let chosenCard = null; // Variable to store the chosen card from fieldset1
    let score = 0; // Variable to store the score

    const sampleData = [
        { id: 1, username: 'JohnDoe', score: 85, timestamp: '2024-06-01 10:30:00' },
        { id: 2, username: 'JaneSmith', score: 92, timestamp: '2024-06-02 09:45:00' },
        { id: 3, username: 'AliceJohnson', score: 78, timestamp: '2024-06-03 14:20:00' },
        { id: 4, username: 'BobBrown', score: 65, timestamp: '2024-06-04 12:30:00' },
        { id: 5, username: 'Hohns', score: 65, timestamp: '2024-06-04 12:30:00' },
        { id: 6, username: 'Nill', score: 65, timestamp: '2024-06-04 12:30:00' },
        { id: 7, username: 'Carbon', score: 65, timestamp: '2024-06-04 12:30:00' },
        { id: 8, username: 'Diseil', score: 65, timestamp: '2024-06-04 12:30:00' },
        { id: 9, username: 'Carlos', score: 88, timestamp: '2024-06-05 15:00:00' }
    ];

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
                console.log(chosenCard);
                if (chosenCard) {
                    chosenCard.classList.remove('highlighted'); // Remove highlight from previously chosen card
                }
                chosenCard = this; // Store the chosen card element
                chosenCard.classList.add('highlighted'); // Add highlight to the chosen card
                console.log('Chosen Card:', chosenCard.querySelector('img').alt); // Log the chosen card value
                
            } else if (this.closest('#fieldset2')) {
                const selectedCard = this.querySelector('img').alt;
                console.log('Selected Card:', selectedCard); // Log the selected card value
                const highlightedFlippedCard = document.querySelector('.card.highlighted.flipped[data-target="fieldset2"]');
                const dataPoseValue = highlightedFlippedCard.getAttribute('data-pose');
                
                
                if (chosenCard.querySelector('img').alt === selectedCard) {
                    score += 10; // Award points for the correct match
                    showAlert('Great! You have chosen the right pose. +10 points', 'success', chosenCard.querySelector('img').src);
                    console.log(chosenCard)
                    
                } else {
                    console.log(chosenCard)
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

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        document.querySelector('.fieldset.active').classList.remove('active');
        document.getElementById('fieldset6').classList.add('active');
        populateScoreTable(sampleData);
        displayFinalScore(); // Display the final score in fieldset6
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
                    <td>${item.timestamp}</td>
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
        const chosenPose = yogaPoses.find(pose => pose.posename === poseName
);
        if (chosenPose) {
            document.getElementById('poseImage').src = chosenPose.poseimage;
            document.getElementById('poseName').textContent = chosenPose.posename;
            document.getElementById('poseBenefits').textContent = chosenPose.benefits
        }
    }

    cards.forEach(card => {
        card.addEventListener('click', function () {
            const poseName = this.getAttribute('data-pose');
            displayChosenPose(poseName);
        });
    });
});

