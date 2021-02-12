<?php
	
	$page_title = "Help";
	require_once("header.php");
	require_once("navigation.php");
	
?>

    <article>
        <p>This GPA Calculator is based on FUPRE's grading system.</p>

        <h2>How to use this GPA Calculator:</h2>
        <ol>
            <li>Select your institution and department.</li>
            <li>Check the level(s) and semester(s) that you want to calculate for.</li>
            <li>Click Proceed.</li>
            <li>
                On the Calculator screen, all the course details for the level(s) and semester(s) you checked
                will be displayed:
                <dl>
                    <dt>Select your grade for each course.</dt>
                    <dt>You may edit the Credit Units if need be.</dt>
                    <dt>You could leave a Credit Unit textfield blank.</dt>
                    <dt>Click on the X button on any course fieldset if you do not wish to calculate that particular course.</dt>
                    <dt>You may decide to add more courses to calculate for each semester at the bottom of page.
                        <br>(This feature would be useful for carryover courses).</dt>
                </dl>
            </li>
            <li>Click Calculate.</li>
            <li>The result of the calculation is then displayed.</li>
        </ol>

        <h2>How to use the Universal GPA Calculator:</h2>
        <p>
            Follow the same process as the FUPRE GPA Calculator.
            The only difference here is to select your institution before you begin.
        </p>

        <h2>How to Calculate GPA manually:</h2>
        <table>
            <caption>University and College of Education Grading System</caption>

            <tr>
                <th>Score</th>
                <th>Grade</th>
                <th>Rating</th>
            </tr>

            <tr>
                <td>70 - 100</td>
                <td>A</td>
                <td>5</td>
            </tr>

            <tr>
                <td>60 - 69</td>
                <td>B</td>
                <td>4</td>
            </tr>

            <tr>
                <td>50 - 59</td>
                <td>C</td>
                <td>3</td>
            </tr>

            <tr>
                <td>45 - 49</td>
                <td>D</td>
                <td>2</td>
            </tr>
                     
            <tr>
                <td>40 - 44</td>
                <td>E</td>
                <td>0</td>
            </tr>

            <tr>
                <td>0 - 39</td>
                <td>F</td>
                <td>0</td>
            </tr>  
        </table>

        <table>
            <caption>Polytechnic Grading System</caption>

            <tr>
                <th>Score</th>
                <th>Grade</th>
                <th>Rating</th>
            </tr>

            <tr>
                <td>75 - 100</td>
                <td>A</td>
                <td>4</td>
            </tr>

            <tr>
                <td>70 - 74</td>
                <td>AB</td>
                <td>3.5</td>
            </tr>

            <tr>
                <td>65 - 69</td>
                <td>B</td>
                <td>3</td>
            </tr>

            <tr>
                <td>60 - 64</td>
                <td>BC</td>
                <td>2.5</td>
            </tr>

            <tr>
                <td>55 - 59</td>
                <td>C</td>
                <td>2</td>
            </tr>

            <tr>
                <td>50 - 54</td>
                <td>CD</td>
                <td>1.5</td>
            </tr>

            <tr>
                <td>45 - 49</td>
                <td>D</td>
                <td>1</td>
            </tr>
                     
            <tr>
                <td>40 - 44</td>
                <td>E</td>
                <td>0.5</td>
            </tr>

            <tr>
                <td>0 - 39</td>
                <td>F</td>
                <td>0</td>
            </tr>  
        </table>
        
        <p>
            <h3>The Credit Point (CP) of each course is calculated by:</h3>
        
            CP = Credit Unit (CU) * Rating<br><br>
            The Total Number of Units (TNU) is gotten by summing the CU of all the courses used in the calculation.<br><br>
            The Total Credit Point (TCP) is gotten by summing the CP of all the courses used in the calculation.<br><br>
            The Grade Point Average (GPA) then calculated:<br>
            GPA = TCP / TNU
        </p>

        <p>
            <h3>For Cumulative GPA (CGPA) calculation:</h3>
            The summation of every TNU is gotten from every semester from beginning to the current semester as Cummulative Number of Units (CNU).
            While the summation of every TCP is gotten as Cummulative Credit Point (CCP).<br>
            
            Then the CGPA is calculated:<br>
            CGPA = CCP / CNU
        </p>

        <table>
            <caption>University Degree Classification:</caption> 
            
            <tr>
                <th>Class of Degree</th>
                <th>CGPA</th>
            </tr>

            <tr>
                <td>4.50 - 5.00</td>
                <td>First Class</td>
            </tr>

            <tr>
                <td>3.50 - 4.49</td>
                <td>Second Class Upper Division</td>
            </tr>

            <tr>
                <td>2.40 - 3.49</td>
                <td>Second Class Lower Division</td>
            </tr>

            <tr>
                <td>1.50 - 2.39</td>
                <td>Third Class</td>
            </tr>
        </table>

        <table>
            <caption>Polytechnic Degree Classification:</caption> 
            
            <tr>
                <th>Class of Degree</th>
                <th>CGPA</th>
            </tr>

            <tr>
                <td>3.5 - 4.0</td>
                <td>First Class</td>
            </tr>

            <tr>
                <td>3.0 - 3.49</td>
                <td>Second Class Upper Division</td>
            </tr>

            <tr>
                <td>2.0 - 2.99</td>
                <td>Second Class Lower Division</td>
            </tr>

            <tr>
                <td>1.00 - 1.99</td>
                <td>Third Class</td>
            </tr>
        </table>

        <table>
            <caption>College of Education Degree Classification:</caption> 
            
            <tr>
                <th>Class of Degree</th>
                <th>CGPA</th>
            </tr>

            <tr>
                <td>4.50 - 5.00</td>
                <td>Distinction</td>
            </tr>

            <tr>
                <td>3.50 - 4.49</td>
                <td>Credit</td>
            </tr>

            <tr>
                <td>2.40 - 3.49</td>
                <td>Merit</td>
            </tr>

            <tr>
                <td>1.50 - 2.39</td>
                <td>Pass</td>
            </tr>
        </table>

    </article>

<?php  
	require_once("footer.php");
?>    