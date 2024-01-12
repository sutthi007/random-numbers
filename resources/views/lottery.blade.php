<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบสุ่มรางวัล</title>
    <!-- Link to Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }

        .container {
            max-width: 600px;
        }

        .result-table {
            margin-top: 20px;
        }

        .prize-result {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center">ระบบสุ่มรางวัล</h2>

        <!-- Randomize Results Button -->
        <button class="btn btn-primary mt-3" onclick="randomizeResults()">ดำเนินการสุ่มรางวัล</button>

        <!-- Result Table -->
        <div class="result-table">
            <table class="table table-bordered">
                <tbody id="resultBody">
                    <tr>
                        <td>รางวัลที่ 1</td>
                        <td id="prize1Number"></td>
                    </tr>
                    <tr>
                        <td>รางวัลเลขข้างเคียงรางวัลที่ 1</td>
                        <td id="sideNumbers"></td>
                    </tr>
                    <tr>
                        <td>รางวัลที่ 2</td>
                        <td id="prize2Numbers"></td>
                    </tr>
                    <tr>
                        <td>รางวัลเลขท้าย 2 ตัว</td>
                        <td id="rear2Number"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Input Field for Ticket Number -->
        <div class="mt-3">
            <label for="ticketNumber" class="form-label">กรอกตัวเลขเพื่อตรวจรางวัล:</label>
            <input type="Number" class="form-control" id="ticketNumber" placeholder="กรอกตัวเลข">
        </div>

        <!-- Check Prize Button -->
        <button class="btn btn-success mt-3" onclick="checkPrize()">ตรวจรางวัล</button>

        <!-- Prize Result Display -->
        <div id="prizeResult" class="mt-3"></div>
    </div>


    <script>
        var randomizeClicked = false;

        function randomizeResults() {
            // Generate random numbers (you can customize this logic)
            var prize1 = Math.floor(Math.random() * 1000);
            var sideNumber1 = Math.floor(Math.random() * 900) + 100;
            var sideNumber2 = Math.floor(Math.random() * 900) + 100;
            var prize2_1 = Math.floor(Math.random() * 900) + 100;
            var prize2_2 = Math.floor(Math.random() * 900) + 100;
            var prize2_3 = Math.floor(Math.random() * 900) + 100;
            var rear2 = Math.floor(Math.random() * 90) + 10;

            // Store the random results in sessionStorage
            sessionStorage.setItem("prize1", prize1);
            sessionStorage.setItem("sideNumbers", sideNumber1 + ', ' + sideNumber2);
            sessionStorage.setItem("prize2Numbers", prize2_1 + ', ' + prize2_2 + ', ' + prize2_3);
            sessionStorage.setItem("rear2Number", rear2);

            // Update table cells with random numbers
            updateTable();
        }

        function updateTable() {
            // Update table cells with the stored random numbers from sessionStorage
            document.getElementById("prize1Number").textContent = sessionStorage.getItem("prize1") || '';
            document.getElementById("sideNumbers").textContent = sessionStorage.getItem("sideNumbers") || '';
            document.getElementById("prize2Numbers").textContent = sessionStorage.getItem("prize2Numbers") || '';
            document.getElementById("rear2Number").textContent = sessionStorage.getItem("rear2Number") || '';
        }


        function checkPrize() {
            var enteredNumber = document.getElementById("ticketNumber").value;
            var prize1Number = document.getElementById("prize1Number").textContent;
            var sideNumbers = document.getElementById("sideNumbers").textContent;
            var prize2Numbers = document.getElementById("prize2Numbers").textContent;
            var rear2Number = document.getElementById("rear2Number").textContent;

            var prizeResult = document.getElementById("prizeResult");
            prizeResult.innerHTML = ""; // Clear previous results

            if (enteredNumber === prize1Number) {
                prizeResult.innerHTML += "<p>คุณถูกรางวัลที่ 1!</p>";
            }

            var sideNumberArray = sideNumbers.split(', ');
            if (sideNumberArray.includes(enteredNumber)) {
                prizeResult.innerHTML += "<p>คุณถูกรางวัลเลขข้างเคียงรางวัลที่ 1!</p>";
            }

            var prize2NumberArray = prize2Numbers.split(', ');
            if (prize2NumberArray.includes(enteredNumber)) {
                prizeResult.innerHTML += "<p>คุณถูกรางวัลที่ 2!</p>";
            }

            if (enteredNumber.endsWith(rear2Number)) {
                prizeResult.innerHTML += "<p>คุณถูกรางวัลเลขท้าย 2 ตัว!</p>";
            }
            if (prizeResult.innerHTML === "") {
                prizeResult.innerHTML = "<p>เสียใจด้วย คุณไม่ถูกรางวัลใดๆ</p>";
            }

        }


        window.onload = function() {
            updateTable();
        };
    </script>
</body>

</html>
