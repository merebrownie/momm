
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getYear() {
    var date = new Date();
    document.getElementById("currentYear").innerHTML = date.getFullYear();
}

document.getElementById('add_contact_form').addEventListener("submit", newContact());
function newContact() {
    if (document.getElementById('contact_name') != null) {
        if (document.getElementById('contact_email' != null)) {
            if (document.getElementById('contact_message' != null)) {
                document.getElementById("add_contact_form").innerHTML = "Thank you for contacting me, I'll be in touch soon!";
            }
        }
    }
}

