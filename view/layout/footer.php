    <footer>
       <nav class="footer">
            
       </nav> 
    </footer>
    <script>
        const button = document.getElementById("buttonCompte")
        const button2 = document.getElementById("buttonCompte2")
        const div = document.getElementById("menu_compte_div")
        const menu = document.getElementById("menu_compte")
        const open_height =document.getElementById("open_height")

        let open = false

        document.onclick =function(e) {
            if (e.target.id !== "menu_compte_div" && e.target.id !== "buttonCompte"){
                menu.style.display = "none";
                button.style = "border: none;"
            }
        }

        button.onclick =function(e){
            menu.style.display = "flex";
            button.style = "border: solid;border-bottom: none;border-width: 2px;border-color: white;"
        }
        button2.onclick =function(e){
            menu.style.display = "flex";
            button.style = "border: solid;border-bottom: none;border-width: 2px;border-color: white;"
        }

        open_height.onclick =function(e){
            if (!open){
                document.getElementsByClassName("nav_select").style = "display: flex"
                open = true
            } else {
                document.getElementsByClassName("nav_select").style = "display: none"
                open_height.style.display = "flex"
                open = false
            }
        }
    </script>
</body>
</html>