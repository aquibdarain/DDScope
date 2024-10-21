<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scope Data</title>
    <style>
        /* Style for the container to center the table and add spacing */
        .table-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            overflow-x: auto;
        }

        /* Style for table headers */
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        /* Make table header standout */
        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Zebra striping effect */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Center heading */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Style the filter form */
        .filter-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .filter-form select {
            padding: 8px;
            font-size: 16px;
        }

        .filter-form button {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .filter-form button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

    <div class="table-container">
        <h1>Scope Data</h1>

        <!-- Filter Form -->
        <div class="filter-form">
            <form method="GET" action="">
                <label for="priority">Filter by Priority:</label>
                <select name="priority" id="priority">
                    <option value="">All</option>
                    <option value="1" <?php echo ($selected_priority == '1') ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo ($selected_priority == '2') ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo ($selected_priority == '3') ? 'selected' : ''; ?>>3</option>
                </select>
                <button type="submit">Filter</button>
            </form>
        </div>

        <table>
            <tr>
                <th>Sr No.</th>
                <th>Feature</th>
                <th>Priority</th>
                <th>Microservice</th>
                <th>Status</th>
            </tr>
            <?php if (!empty($scope_data)): ?>
                <?php 
                $sr_no = 1;
                foreach ($scope_data as $scope): ?>
                    <tr>
                        <td><?php echo $sr_no++; ?></td>
                        <td><?php echo $scope['Feature']; ?></td>
                        <td><?php echo $scope['Priority']; ?></td>
                        <td><?php echo $scope['Microservice']; ?></td>
                        <td><?php echo $scope['Status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No data found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<<<<<<< HEAD
=======
  </div>
</section>



  </main>

  <!-- <footer class="align-self-end">
    <section class="footer">
      <div class="container">
        <ul class="footlist">
          <li><a href='careers.php'>Careers</a> |</li>
          <li><a href='video.php'>Video</a> |</li>
          <li><a href='policy.php'>Privacy Policy</a> </li>
        </ul>
        <p class="copywrite">Copyright &copy; 2024 DozenDiamonds. All Rights Reserved.</p>
      </div>
    </section>
  </footer> -->
  <?php include("application/views/footer.php"); ?>


  <div id="back-top"><a href="#top"><span></span></a> </div>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/topscroll.js"></script>
  <script src="source/jquery.fancybox.js?v=2.1.5"></script>
  <script src="js/scrolla.jquery.min.js"></script>
  <script src="js/menu-script.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    window.onload = function() {
      $(".se-pre-con").fadeOut("slow");
    };
  </script>

  <script>
    $('.fadeOut').owlCarousel({
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      items: 1,
      smartSpeed: 450,
      loop: true,
      autoplay: true,
      dots: false
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const messages = document.querySelectorAll(".message-container h2");
      let currentMessageIndex = 0;

      function showNextMessage() {
        messages[currentMessageIndex].classList.remove("active");
        currentMessageIndex = (currentMessageIndex + 1) % messages.length;
        messages[currentMessageIndex].classList.add("active");
      }

      setInterval(showNextMessage, 8000); // Change message every 5 seconds
    });
  </script>

  <script>
    const marqueeContent = document.getElementById('marquee-content');
    const testibg = document.getElementById('testibg');

    testibg.addEventListener('mouseover', () => {
      marqueeContent.style.animationPlayState = 'paused';
    });

    testibg.addEventListener('mouseout', () => {
      marqueeContent.style.animationPlayState = 'running';
    });
  </script>
>>>>>>> d7b4c3740d35bee2dc96027519bbb507d762e6c8

</body>
</html>
