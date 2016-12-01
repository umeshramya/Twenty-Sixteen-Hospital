# Twenty-Sixteen-Hospital
This is a child theme of WordPress twenty sixteen theme.
This theme is for hospital.

This theme meeds twentysixteen theme to be place theme folder also

Activate Twenty-Sixteen-Hospital.

after actiavtion goto admim penal
select Hospital from menu in admin area.
Enter hospital details.

Special fields in hospital page in admin area
1. Departements
2. Facilities
3. Faculty Hierarchy

1. Departements
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

2. Facilities
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

======================
SHORT CODES
======================
Please note these are important parts of this theme will go long way desgning website for hospital


[faculty_by_hierarchy_department hierarchy = ""]

hierarchy :- this atribute is to be taken from user_faculty_hierarchy(user profile page) or from faculty_hierarchy ( hospital menu page).
this short code will detect departement from titile.
to be used in custom post type Departements.
