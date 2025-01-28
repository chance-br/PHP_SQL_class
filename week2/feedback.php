<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Feedback Form</title>
    </head>
    <body>
        <div><p>Please complete this form to submit your feedback.</p></div>

        <form action="handle_form.php">
            <p>
                First Name:

                <input type="text" name="name" size="20" required>
            </p>
            
            <p>
                Last Name:

                <select name="title" required>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Ms.">Ms.</option>
                </select>

                <input type="text" name="name" size="20" required>
            </p>

            <p>
                Email Address: <input type="email" name="email" size="20" required>
            </p>

            <p>
                Response: This is...
                
                <input type="radio" name="response" value="excellent" required>
                excellent

                <input type="radio" name="response" value="okay">
                okay

                <input type="radio" name="response" value="boring">
                boring
            </p>

            <p>
                Comments:
                <textarea name="comments" rows="3" cols="30" required></textarea>
            </p>

            <input type="submit" name="submit" value="Send My Feedback">
        </form>
    </body>