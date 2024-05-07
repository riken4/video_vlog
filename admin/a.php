<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Active/Inactive Comments</title>
<style>
    /* Hide the comment section by default */
    #comment-section {
        display: none;
    }
</style>
</head>
<body>
    <label for="active">Active</label>
    <input type="radio" name="status" id="active" value="active" checked>
    <label for="inactive">Inactive</label>
    <input type="radio" name="status" id="inactive" value="inactive">

    <div id="comment-section">
        <h2>Comments</h2>
        <p>This is the comment section.</p>
    </div>

    <script>
        document.querySelectorAll('input[type="radio"]').forEach(function(el) {
            el.addEventListener('change', function() {
                if (this.value === 'active') {
                    document.getElementById('comment-section').style.display = 'block';
                } else {
                    document.getElementById('comment-section').style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>