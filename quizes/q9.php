<!--
/**
 * User: njbartel
 * Date: November 29th, 2018
 * Desc: Quiz 9
 * Grade: 9 / 10
 */
1. (1.5/2pts)   Note that this is an html file, and not php.
                Include a basic HTML 5 frame for this page, including the following elements:
                html, head, title, body, doctype, and at least one button.
MISSING BODY TAG

2. (4pts)   Include the jQuery library on this page, any way you want (local or remote).

B. (0/2pt)    Complete items 3 and 4 below using a "js object" structure.

3. (1/2pt)    Open a script at the bottom of the page.
                In this script, select the button element above and store it in any JS var.
    DIDNT STORE VAR

4. (2pts)   Create two handlers for this button, an onlick and an onmouseover.
                Implement a console.log for these events, the output string can be anything.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
    <button type="button">Button</button>

    <script>
        //var button = $('button');
        $("button").on('click', function(){
            console.log("Button clicked");
        });
        $("button").on('mouseover', function(){
            console.log("Button Moused over");
        });

    </script>
</body>
</html>
