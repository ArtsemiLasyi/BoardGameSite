        <div class="wrap">
          <div class="cube" id="cube">
            <div class="front" id="1">
              *
            </div>
            <div class="back" id="2">
              * *
            </div>
            <div class="top" id="3">
              * * *
            </div>
            <div class="bottom" id="4">
              * *<br>* *
            </div>
            <div class="left" id="5">
              * * *<br>* *
            </div>
            <div class="right" id="6">
              * * *<br>* * *
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <script>
          function getRandomInt(max)
          {
            return Math.floor(Math.random() * Math.floor(max));
          }
          function getnumber()
          {
            let num = (getRandomInt(11990)%6)+1;
            return num;
          }

          function changecube()
          {
            let num = getnumber();
            let root = document.querySelector(':root');
            let rootStyles = getComputedStyle(root);
            let count = rootStyles.getPropertyValue('--count');
            if (count == 'infinite')
            {
              document.getElementById("1").innerHTML = document.getElementById(num).innerHTML;
              root.style.setProperty('--count', '1');
            }
            else
            {
              root.style.setProperty('--count', 'infinite');
            }
            return 0;
          }
        </script>
        <div align="center">
          <input type="button" class="button" value="Кинуть кубик" onclick="changecube()">
        </div>



     