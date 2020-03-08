<h1>Database design:</h1>
<ol>
    <li>A challenge has a challenge identifier, a title, description, deadline, status, created at date, updated at date, deleted at date.</li>
    <li>A comment has an identifier, a name user, email user and content comment.</li>
    <li>1 challenge has many comments.</li>
    <li>1 comment belongs to 1 challenge.</li>
    <li>A guest has an identifier, a name, an email, a password, a created, updated and deleted at date.</li>
    <li>1 guest can access many challenges.</li>
    <li>1 challenge can be accessed by many guests.</li>
    <li>We desire saving the guests participating in the challenges.</li>
    <li>A participant can submit his code at a certain date (date submission), edit his code, delete his code, we desire to know wether he submitted his code or not, the winner of the challenge.</li>
    <li>An organizer has an identifier, a name, an email and password, created at, updated at and deleted at dates for his account.</li>
    <li>An organizer can organize many challeneges.</li>
    <li>A challenge is organized by 1 organized.</li>
    <li>An admin has an identifier, a name, an email, a password, a created at date for his account, an updated at date and a deleted at date.</li>

</ol>