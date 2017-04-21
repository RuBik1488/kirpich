<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Калькулятор стоимости доставки</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
<section class="cost"><div class="container-fluid">
    <div class="row">
      <div class="block col-md-9 col-sm-6 col-xs-12">
        <div class="form-one">
          <div class="form-one-top">
          <div class="cal">
              <h3>Калькулятор доставки</h3>

              <div class="bg_cal">
                  <form action="#" class="сal-form">
                      <div class="wh_wh">
                          <div>
                              <p><label for="form">Откуда</label></p>
                              <input id="from" name="Whence" type="text" placeholder="">
                          </div>
                          <span> <img src="/images/wh.png" alt=""> </span>
                          <div>
                              <p><label for="where">Куда</label></p>
                              <input id="where" name="where" type="text" placeholder="">
                          </div>
                      </div>
                      <div class="delivery">
                          <div class="trans">
                              <p><label for="delivery">Вид транспорта</label></p>

                              <div class="select_main">
                                  <select id="kind" name="freight_type">
                                      <option value="1">Тентованный</option>
                                      <option value="2">Изотермический</option>
                                      <option value="3">Контейнеровоз</option>
                                      <option value="4">Бортовой</option>
                                      <option value="5">Негабаритная площадка</option>
                                  </select>
                              </div>
                          </div>

                          <div class="wr_tonn">
                              <p><label for="tonn">Объем</label></p>
                              <div class="tonn">
                                  <div class="kuby">
                                      <label for="1" class="for-radio1">
                                          <input name="dimension" type="radio" value="1"/>
                                      </label>
                                      <span>до 30 м<sup><small>3</small></sup></span>
                                  </div>
                                  <div class="kuby">
                                      <label for="2" class="for-radio2">
                                          <input name="dimension" type="radio" value="2"/>
                                      </label>
                                      <span>до 50 м<sup><small>3</small></sup></span>
                                  </div>
                                  <div class="kuby">
                                      <label for="3" class="for-radio3">
                                          <input name="dimension" type="radio" value="3">
                                      </label>
                                      <span>до 120 м<sup><small>3</small></sup></span>

                                      <script>
                                          function check2(){
                                              alert("selected: " + $('input[name=r]:checked').val());
                                          }

                                      </script>

                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="cal_sub">
                          <input type="submit" class="submit-deli" value="Стоимость доставки"/>
                          <img src="/images/wh.png" alt="">
                      </div>
                  </form>
              </div>
            </div>

<!--           <p><label for="Whence">Откуда</label></p>
                <input id="from" name="departure_city" type="text" placeholder="" autocomplete="off">
           <p><label for="where">Куда</label></p>
                <input id="where" name="delivery_city" type="text" placeholder="" autocomplete="off">
            <div class="select_main">
              <select id="kind" name="freight_type">
                <option disabled selected>Выберите транспорт</option>
                <option value="1">Тентованный</option>
                <option value="2">Изотермический</option>
                <option value="3">Контейнеровоз</option>
                <option value="4">Бортовой</option>
                <option value="5">Негабаритная площадка</option>
              </select>
            </div>
            <div class="select_main">
              <select id="volume" name="dimension">
                <option disabled selected>Выберите объем</option>
                <option value="1">до 5 тонн (до 30м3)</option>
                <option value="2">до 10 тонн (до 50м3)</option>
                <option value="3">до 20 тонн (до 120м3)</option>
              </select>
            </div>
            <div class="form-one-field" class="distance">
              <div class="form-one-price">
                <p>Дистанция:</p> <strong id="distance">0 км</strong>
                <input id="distanceform" name="distanceform" type="hidden" value="">
              </div>
            </div>
            <div class="form-one-field" class="price">
              <div class="form-one-price">
                <p>Цена:</p> <strong id="price">0,00 <i class="fa fa-rub" aria-hidden="true"></i></strong>
                <input id="priceform" name="priceform" type="hidden" value="">
              </div>
            </div>
          </div> -->


        </div>
      </div>
    </div>
      <div class="block col-md-3 col-sm-6 col-xs-12">
          <div class="col3">
              <div class="wr_raschet">
                  <span class="title">Расчет доставки</span>
                  <div class="wr_in">
                      <span class=lab>Откуда</span>
                      <span class="in">Тула, Тульская область, Россия</span>
                  </div>
                  <div class="wr_in">
                      <span class=lab>Куда</span>
                      <span class="in">сило Зыкино, Рузаевский район, Мордовия</span>
                  </div>
                  <div class="wr_in">
                      <span class=lab>Объем</span>
                      <span class="in">до 10 тонн (50м)</span>
                  </div>
                  <div class="summ">
                      <div class="ras"><span>Дистанция:</span><span class="itog">468м</span></div>
                      <div class="ras"><span>Цена:</span><span class="itog">15679 <i class="fa fa-rub" aria-hidden="true"></i></span></span></div>
                      <div class="ras"><span>Удорожание:</span><span class="itog">0 <i class="fa fa-rub" aria-hidden="true"></i>/шт.</span></span></div>
                  </div>
              </div>
          </div>
      </div>
</div></section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBUYNH6x8bzJvNzXNFQs_AwIkpq1OABZPE&libraries=places" type="text/javascript"></script>
<script src="params.js"></script>
<script src="js/calc.js"></script>
</body>
</html>