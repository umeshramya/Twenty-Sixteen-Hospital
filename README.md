# Twenty-Sixteen-Hospital
This is a child theme of WordPress twenty sixteen theme.
This theme is for hospital.

This theme meeds twentysixteen theme to be place theme folder also

Activate Twenty-Sixteen-Hospital.

after actiavtion goto admim penal
select Hospital from menu in admin area.
Enter hospital details.

##Special fields in hospital page in admin area
1. Departements
2. Facilities
3. Faculty Hierarchy


###1. Departements
      1.1. Declare all the departements in your hospital page.
      1.2. Arrage them as per importance
      1.3. Please note that same order archive page of departements uses to display
      1.4. Set feuture image (seen only in archive page of departments)
      1.5. single page uses single-department.php
      1.6. Paste the shorte code in editor to get staff see shortcods section below
      1.7. degine your departement
      1.8. Do not edit the titile as it is used by code to generates staffs
      1.9. Deleting departement custom post
          1.9.1. Themes generates once more departement only it is deleted from thrash
          1.9.2. To hide departement just set to draft.
          1.9.3. To rearrange the order change the date of publish (newest will first to display)

###2. Facilities
      2.1. Declare all the Facilities in your hospital page.
      2.2. Arrage them as per importance
      2.3. Please note that same order archive page of Facilities uses to display
      2.4. Set feuture image (seen only in archive page of Facilities)
      2.5. single page uses single-Facilities.php
      2.6. This custom type is meant for Declaring instruments for small hospitals along with this one can display infrastructure like    ICU, delexe room spacial room. For big hospital use infrastructure custom post
      2.7. degine your departement
      2.8. Do not edit the titile.for editing Facilities use hospital menu page
      2.9. Deleting Facilities custom post
          2.9.1. Themes generates once more departement only it is deleted from thrash
          2.9.2. To hide Facilities just set to draft.
          2.9.3. To rearrange the order change the date of publish (newest will first to display)

3. Faculty Hierarchy
  3.1. This field is for seting up positiion of users like HOD, Associate Professor, Assistant professor, Resident, Techaniacian, Nusre. One can declere them as per need of the hopistal.
  3.2. Note Order of mention will be used as seniority



##How to activate author or user profile page with contact form?
 1. Please note that only those users or authors or individual page will be active who have at least one blog post active.So kinldy write one blog post.
 2. To activate contact form:- mark check to checkbox activate contact form. Your form will be active only in case admin activate Builtin conact form from hospita menu(this applies every one).

## other custom types are degined with specific purpose
  1. Goverment schemes (schemes) for from public sector like BPL card holder, Yeshewini etc
  4. Private Insurences (Insurances) for TPA like Vidal, mediasst etc
  4. Packages for hospital Packages like master health check up, visa health checkup CABG package etc
  4. Reviews patient reviews subimmted from patients(these can enbled from front by use if shortcodes see below)
  4. carriers for announceing job vacancy announceing

#SHORT CODES

Please note these are important parts of this theme will go long way desgning website for hospital


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


##[hospital_phones_email]
Displays all phones set in setting and also hospital email
