<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="config\css\styles.css">
    <link rel="stylesheet" src="styling.css">
    <title>Babylon!</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="config\images\hammurabi.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            Babylon
        </a>
    </nav>

    <div class="container" id="main-container">
        <div class="row" id="headline-row">All hail, Hammurabi! May your kingdom reign forever!</div>
        <div class="row justify-content-md-center" id="empire-stats-row">
            <div class="col-sm-6">
                <table class="table table-bordered table-sm table-hover">
                    <tbody>
                        <tr>
                        <th>Current Year to Plan</th>
                        <td id="year">1572 BC</td>
                        </tr>
                        <tr>
                        <th>Population</th>
                        <td>15,000</td>
                        </tr>
                        <tr>
                        <th>Projected Growth Rate</th>
                        <td>2.5%</td>
                        </tr>
                        <tr>
                        <th>Food Units Required</th>
                        <td id="foodUnitsRequired1Year">12,500</td>
                        <td id="foodUnitsRequired2Year">12,500</td>
                        <td id="foodUnitsRequired3Year">12,500</td>
                        </tr>
                        <tr>
                        <th>Food Units Projected</th>
                        <td id="foodUnitsProjected1Year">12,500</td>
                        <td id="foodUnitsProjected2Year">12,500</td>
                        <td id="foodUnitsProjected3Year">12,500</td>
                        </tr>
                    </tbody>
                </table>                
            </div>

        </div>
        <div class="row" id="action-status-row">

        </div>
        <div class="row justify-content-md-center" id="food-stores-row">
            <div class="col-sm-9">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Food Qty <br/><span class="sub-heading">(1 year to consume)</span></th>
                            <th>Plant Qty <br><span class="sub-heading">(2-3 years)</span></th>
                            <th>Seed Qty <br/><span class="sub-heading">(3 years to produce)</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <th id="food0">A</th>
                          <td class="nested-td">
                            <table class="nested-table">
                              <tr class="nested-row"><td id="food0qty"></td></tr>
                              <tr class="nested-row"><td id="food0qtyControls">
                                eat: <input class="input" id="food0Eat" type="text">
                                store: <input class="input" id="food0Store" type="text">
                                </td></tr>
                            </table>
                          </td>

                          <td class="nested-td" id="plant0QtyTd">
                            <table class="nested-table">
                              <tr class="nested-row top"><td id="plant0qty"></td></tr>
                              <tr class="nested-row"><td id="plant0qtyControls">
                                destroy: <input class="input" id="plant0Destroy" type="text">
                                </td></tr>
                            </table>
                          </td>


                          <td class="nested-td" id="seed0QtyTd">
                            <table class="nested-table">
                              <tr class="nested-row"><td id="seed0qty"></td></tr>
                              <tr class="nested-row"><td id="seed0qtyControls">
                                store: <input class="input" id="seed0Store" type="text">
                                plant: <input class="input" id="seed0Plant" type="text">
                                </td></tr>
                            </table>
                          </td>


                          </td>
                        </tr>
                        <tr>
                          <th id="food1">A</th>
                          <td id="food1qty"></td>
                          <td id="plant1qty"></td>
                          <td id="seed1qty"></td>
                        </tr>
                        <tr>
                          <th id="food2">A</th>
                          <td id="food2qty"></td>
                          <td id="plant2qty"></td>
                          <td id="seed2qty"></td>
                        </tr>
                        <tr>
                          <th id="total-row">Total:</th>
                          <td id="totalFood">Consumption</td>
                          <td id="totalPlant">Production</td>
                          <td id="totalSeed">Storage</td>
                        </tr>
                    </tbody>
                </table>                
            </div>  
        </div>
        <div class="row justify-content-md-center" id="button-row">
            <button type="button" class="btn btn-success">Ready for the year!</button>
        </div>
    </div> <!-- main container -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        $(function(){
            // select ruler popup
            var ruler = 'Hammurabi';
            // get starting conditions (ajax), populate dom
            getStartupConditions(ruler);
        });

        function getStartupConditions(ruler) {
            $.ajax({
                url:"src/ajaxCalls.php",
                type: "post",
                dataType: 'json',
                data: {key: "startup", leader: ruler},
                success:function(result) {
                    var food = result.food;
                    var leader = result.leader;
                    var year = leader['year_start'];
                    console.log(result.food);
                    console.log(result.leader);

                    $('#headline-row').text("All hail, "+leader['name']+"! Ruler of Babylon from "+leader['year_start']+"-"+leader['year_end']+" B.C.");
                    $('#year').text(year).append(' B.C');
                    setUpTurn(food, leader);
                }
            });

            function setUpTurn(food, leader) {
                var totalFood = 0;
                var totalPlant = 0;
                var totalSeed = 0;
                //populate food tables
                for (i=0; i<3; i++) {
                  $('#food'+i).text(food[i]['name']);  
                  $('#food'+i+'qty').text(food[i]['food_qty']).append(' available');
                  $('#food'+i+'Eat').val(food[i]['food_qty']);
                  $('#food'+i+'Store').val(0);
                  $('#plant'+i+'qty').text(food[i]['plant_qty']).append(' planted');
                  $('#plant'+i+'Destroy').val(0);
                  $('#seed'+i+'qty').text(food[i]['seed_qty']).append(' in storage');
                  $('#seed'+i+'Store').val(food[i]['seed_qty']);
                  $('#seed'+i+'Plant').val(0);
                  totalFood = totalFood + parseInt(food[i]['food_qty']);
                  totalPlant = totalPlant + parseInt(food[i]['plant_qty']);
                  totalSeed = totalSeed + parseInt(food[i]['seed_qty']);
                }
                console.log(totalPlant);
                $('#totalFood').text(totalFood).append(' for consumption');
                $('#totalPlant').text(totalPlant).append(' for production');
                $('#totalSeed').text(totalSeed).append(' in storage');
                
                //populate babylon status tables
                
            }

            function processTurn() {
                // get actionNumbers
                // check if totalFood > requiredFood, if not, kill off population
                // get weather/crop output
                // get natural disasters, reduce as required
                // turn planted into food to consume
                //reduce seed storage
                // increase/decrease population
            }

        }
    </script>
  </body>
</html>