<form id="filterForm" action="landing_page.php" method="get">
    <ul class="list-group mb-3">
        <p class="cardHeader">By price</p>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <label for="priceSlider">Select Price Range: </label>
                <input type="range" class="price" name="price" id="priceSlider" min="500" max="2500" step="500" value="<?= isset($_GET['price']) ? $_GET['price'] : 1000 ?>">
                <output for="priceSlider">$<span id="priceOutput"><?= isset($_GET['price']) ? $_GET['price'] : 1000 ?></span></output>
            </div>
        </li>
        <br>
        <p class="cardHeader">RAM size</p>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <label for="ramSlider">Select RAM Size: </label>
                <input type="range" class="RAM" name="RAM" id="ramSlider" min="8" max="64" step="8" value="<?= isset($_GET['RAM']) ? $_GET['RAM'] : 8 ?>">
                <output for="ramSlider"><span id="ramOutput"><?= isset($_GET['RAM']) ? $_GET['RAM'] : 8 ?></span>GB</output>
            </div>
        </li>
        <br>
        <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
    </ul>
</form>

<script>
    // Add script to update output values dynamically
    document.getElementById('priceSlider').addEventListener('input', function () {
        document.getElementById('priceOutput').textContent = this.value;
        submitForm();
    });

    document.getElementById('ramSlider').addEventListener('input', function () {
        document.getElementById('ramOutput').textContent = this.value;
        submitForm();
    });

    // Function to submit the form
    function submitForm() {
        document.getElementById('filterForm').submit();
    }
</script>