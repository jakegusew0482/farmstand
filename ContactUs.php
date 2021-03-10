    <?php include('navbar.php'); ?>

    <!-- Side Column of Main Page -->
    <div class="row">
      <div class="side">
        <h2>Support Your Local Farm Stand</h2>
        <button onclick="getLocation()">Find Near Me</button>

        <h3>Search by Type of goods</h3>
        <input
          type="text"
          id="myInput"
          onkeyup="myFunction()"
          placeholder="Search for Type of stand"
        />
      </div>

      <!--Main Page-->
      <div class="main">
        <h3>Contact Form</h3>

        <div class="container">
          <form action="/action_page.php">
            <label for="fname">First Name</label>
            <input
              type="text"
              id="fname"
              name="firstname"
              placeholder="Your name.."
            />

            <label for="lname">Last Name</label>
            <input
              type="text"
              id="lname"
              name="lastname"
              placeholder="Your last name.."
            />

            <label for="lname">Email</label>
            <input
              type="text"
              id="email"
              name="Email"
              placeholder="Your Email Address"
            />

            <label for="country">Country</label>
            <select id="country" name="country">
              <option value="australia">United States</option>
              <option value="canada">South America</option>
              <option value="usa">Europe</option>
              <option value="usa">South Americal</option>
              <option value="usa">Antartica</option>
              <option value="usa">Outer Space</option>
              <option value="usa">Somewhere lost</option>
              <option value="usa">Something</option>
            </select>

            <label for="subject">Subject</label>
            <textarea
              id="subject"
              name="subject"
              placeholder="Write something.."
              style="height: 200px"
            ></textarea>

            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </div>

    <div class="footer">
      <h5>To Reach us, send us an Email: www.somekindofemail@something.com</h5>
    </div>
  </body>
</html>
