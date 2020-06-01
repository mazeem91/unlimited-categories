<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <!-- STYLES -->
</head>
<body>
<select id="root" onchange="ajaxfunction(this)">
<?php foreach ($categories as $category) :?>
<option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
<?php endforeach;?>
</select>



<script type="text/javascript">
    function ajaxfunction(parent)
    {
        var value = $(parent).find("option:selected"); 
        $(parent).nextAll('select').remove();

        var sel = $('<select>').insertAfter($(parent));

        $.ajax({
            url: 'home/createSubs/' + value.val(),
            success: function(data) {
                console.log(data);
                data.forEach(function(item) {
                    sel.append($('<option>').attr("value",item["id"]).text(item["title"]));
                });
                sel.change(function(){ return ajaxfunction(sel); });
            }
        });
    }
</script>
</body>
</html>
