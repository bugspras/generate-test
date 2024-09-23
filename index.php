<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .box {
            width: 50px;
            height: 50px;
            margin: 10px;
            display: inline-block;
            border: 1px solid black;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            cursor: pointer;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>


    <form method="post" action="">
        <input type="number" name="jumlah" placeholder="Tulis jumlah angka" required>
        <button type="submit">Generate</button>
    </form>

    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jumlah = intval($_POST['jumlah']);
            for ($i = 1; $i <= $jumlah; $i++) {
                echo "<div class='box' id='box-$i'>$i</div>";
            }
            echo "<script>var maxNumber = $jumlah;</script>";
        }
        ?>
    </div>

    <script>
        let availableNumbers = [];

        function initializeNumbers(maxNumber) {
            availableNumbers = [];
            for (let i = 1; i <= maxNumber; i++) {
                availableNumbers.push(i);
            }
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }

        function generateRandomUniqueNumber() {
            shuffleArray(availableNumbers);
            return availableNumbers.pop();
        }

        if (typeof maxNumber !== 'undefined') {
            initializeNumbers(maxNumber);
            document.querySelectorAll('.box').forEach(function(box) {
                box.addEventListener('click', function() {
                    if (availableNumbers.length > 0) {
                        var randomNumber = generateRandomUniqueNumber();
                        this.textContent = randomNumber;
                    } else {
                        alert('Semua nomor telah digunakan!');
                    }
                });
            });
        }
    </script>

</body>
</html>
