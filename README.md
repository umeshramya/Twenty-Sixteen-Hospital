# Twenty-Sixteen-Hospital
This is a child theme of WordPress twenty sixteen theme.
This theme is for hospital.

This theme needs twentysixteen theme to be placed theme folder also

Activate Twenty-Sixteen-Hospital.

After actiavtion goto admim penal
select Hospital from menu in admin area.
Enter hospital details.

##Special fields in hospital page in admin area
1. Departements
2. Facilities
3. Faculty Hierarchy
3. Managamnet Hierarchy


###1. Departements
      1.1. Declare all the departements in your hospital page.
      1.2. On front end they will be sorted alphabetically
      1.3. Set feuture image (seen only in archive page of departments)
      1.4. single page uses single-department.php
      1.5. Paste the shorte code in editor to get staff see shortcods section below
      1.6. degine your departement
      1.7. Do not edit the titile as it is used by code to generates staffs
      1.8. Deleting departement custom post
          1.8.1. Themes generates once more departement only it is deleted from thrash
          1.8.2. To hide departement just set to draft.


###2. Facilities
      2.1. Declare all the Facilities in your hospital page.
      2.2. On front end they will be sorted alphabetically
      2.3. Set feuture image (seen only in archive page of Facilities)
      2.4. single page uses single-Facilities.php
      2.5. This custom type is meant for Declaring instruments for small hospitals along with this one can display infrastructure like    ICU, delexe room spacial room. For big hospital use infrastructure custom post
      2.6. degine your departement
      2.7. Do not edit the titile.for editing Facilities use hospital menu page
      2.8. Deleting Facilities custom post
          2.8.1. Themes generates once more departement only it is deleted from thrash also
          2.8.2. To hide Facilities just set to draft.


3. Faculty Hierarchy
  3.1. This field is for seting up positiion of users like HOD, Associate Professor, Assistant professor, Resident, Techaniacian, Nusre. One can declere them as per need of the hopistal.
  3.2. Note Order of mention will be used as seniority

4. Managament hierarchy
 4.1 this field is display the managment of hospital may be doctors or not.
 group them like Chairperson, vice Chairperson, medical Directorats by  coma saparted at hosptial Settings.
 4.2 at user menu choose if approprite
 4.4 shortcode [hospital_managment_by_hierarchy] to display on front end



##How to activate author or user profile page with contact form?
 1. Please note that only those users or authors or individual page will be active who have at least one blog post active.So kinldy write one blog post.
 2. To activate contact form:- mark check to checkbox activate contact form. Your form will be active only in case admin activate Builtin conact form from hospita menu(this applies every one).
 3.  Use SMTP for sending email. plugin like Gmail SMTP is helpfull. Eihter google suite previously named as google apps (paid service)
 or free Gmail account is OK

## other custom types are degined with specific purpose
  1. Goverment schemes (schemes) for from public sector like BPL card holder, Yeshewini etc
  2. Private Insurences (Insurances) for TPA like Vidal, mediasst etc
  3. Packages for hospital Packages like master health check up, visa health checkup CABG package etc
  4. Reviews patient reviews subimmted from patients(these can enbled from front by use if shortcodes see below)
  5. carriers for announceing job vacancy announceing


#SHORT CODES

Please note these are important parts of this theme will go long way desgning website for hospital

##[hospital_management_by_hierarchy]
This displays hospital Management please use this on full width templates pages not with sidebar


##[faculty_by_hierarchy_department hierarchy = ""]
hierarchy :- this atribute is to be taken from user_faculty_hierarchy(user profile page) or from faculty_hierarchy ( hospital menu page).
this short code will detect departement from titile.
to be used in custom post type Departements.

##[faculty_by_department]
this short code has to used inside departement posttype with titile set departement set in hospital setting page. its display the departement using title

##[faculty_get_auhtor_by email='']
This short code display auhtor archive profile by email as argument

##[contact form contact_form to_email=""]
while using this conact form in to email has be written in between "" as argument

##[review_submit to_email=""]
This shorte code is to be used for displaying form to accept reviews from patients
use in any page or post where your want recive reviews
to_email argument is for send email alert like admin email or hospital email
by defult this fucntion saves the review in draft from
it needs to published to make publically visible

##[hospital_name]
Diplays name of hospital

##[emergency_phone]
displays emergency phone of hospital

##[ambulance_phone]
Displays ambulance phone

##[help_desk_phone]
Displays help desk phone

##[office_phone]
Display office phone

##[hospital_email]
Display hospital email


##[address_phones_email]
Displays all phones set in setting and also hospital email

##[hospital_address]
Dispays Hospital address within <pre> eleement


##[schemes]
Displays titles with links of Goverment Schemes

##[insurances]
Displays titles with links of Private insurances
