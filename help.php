<?php
	
	$page_title = "Help";
	require_once("header.php");
	require_once("navigation.php");
	
?>

    <div class = "container" style = "text-align: left;">
    
        <img src = "images/fupre_logo.png" alt = "FUPRE Logo" style = "display: block; margin: 0px auto; float: center;"/>

        <p>This GPA Calculator is based on FUPRE's grading system.</p>

        <h2>How to use this GPA Calculator:</h2>
        <ol>
            <li>Select your department.</li>
            <li>Check the level(s) and semester(s) that you want to calculate for.</li>
            <li>Click Proceed.
            <li>
                On the Calculator screen, all the course details for the level(s) and semester(s) you checked
                will be displayed.<br>
                You may edit the Credit Units if need be. You could leave a Credit Unit textbox blank 
                or set it to 0 if you do not wish to calculate a particular course.<br>
                Select your grade for each course.<br>
                You may decide to add more courses to calculate at the bottom of page.
            </li>
            <li>Click Calculate.</li>
            <li>The result of the calculation is then displayed.</li>
        </ol>

        <h2>How to Calculate GPA manually:</h2>
        <table>
            <caption>Performance Rating:</caption>

            <tr>
                <th>Score</th>
                <th>Grade</th>
                <th>Rating</th>
            </tr>

            <tr class = "even_row">
                <td>70 - 100</td>
                <td>A</td>
                <td>5</td>
            </tr>

            <tr class = "odd_row">
                <td>60 - 69</td>
                <td>B</td>
                <td>4</td>
            </tr>

            <tr class = "even_row">
                <td>50 - 59</td>
                <td>C</td>
                <td>3</td>
            </tr>

            <tr class = "odd_row">
                <td>45 - 49</td>
                <td>D</td>
                <td>2</td>
            </tr>
                     
            <tr class = "even_row">
                <td>40 - 44</td>
                <td>E</td>
                <td>0</td>
            </tr>

            <tr class = "odd_row">
                <td>0 - 39</td>
                <td>F</td>
                <td>0</td>
            </tr>
            
        </table>
        
        <p>
            The Credit Point (CP) of each course is calculated by:<br>
        
            CP = Credit Unit (CU) * Rating<br>
            The Total Number of Units (TNU) is gotten by summing the CU of all the courses used in the calculation.<br>
            The Total Credit Point (TCP) is gotten by summing the CP of all the courses used in the calculation.<br>
            The Grade Point Average (GPA) then calculated:<br>
            GPA = TCP / TNU
        </p>

        <p>
            For Cumulative GPA (CGPA) calculation:<br>
            The summation of every TNU is gotten from every semester from beginning to date as Cumulative Number of Units (CNU).
            While the summation of every TCP is gotten as Cumulative Credit Point (CCP).<br>
            
            Then the CGPA is calculated:<br>
            CGPA = CCP / CNU
        </p>

        <table>
            
            <caption>Classification:</caption> 
            
            <tr>
                <th>Class of Degree</th>
                <th>CGPA</th>
            </tr>

            <tr class = "even_row">
                <td>4.50 - 5.00</td>
                <td>First Class</td>
            </tr>

            <tr class = "odd_row">
                <td>3.50 - 4.49</td>
                <td>Second Class Upper Division</td>
            </tr>

            <tr class = "even_row">
                <td>2.40 - 3.49</td>
                <td>Second Class Lower Division</td>
            </tr>

            <tr class = "odd_row">
                <td>1.50 - 2.39</td>
                <td>Third Class</td>
            </tr>

        </table>

    </div>  <!-- end of container -->

<?php  
	require_once("footer.php");
?>    