<?php
/**
 * Default Greek Lexicon Entries for miniShop2
 *
 * @package minishop2
 * @subpackage lexicon
 */

include_once('setting.inc.php');
$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, 'msp.') === 0) {
        @include_once($file);
    }
}

$_lang['minishop2'] = 'miniShop2';
$_lang['ms2_menu_desc'] = 'Εξαιρετική επέκταση ηλεκτρονικού εμπορίου';
$_lang['ms2_order'] = 'Παραγγελία';
$_lang['ms2_orders'] = 'Παραγγελίες';
$_lang['ms2_orders_intro'] = 'Διαχείριση των παραγγελιών σας';
$_lang['ms2_orders_desc'] = 'Διαχείριση των παραγγελιών σας';
$_lang['ms2_settings'] = 'Ρυθμίσεις';
$_lang['ms2_settings_intro'] = 'Βασικές ρυθμίσεις του καταστήματος. Εδώ μπορείτε να προσδιορίσετε τις μεθόδους πληρωμής, τις διανομές και τις καταστάσεις των παραγγελιών';
$_lang['ms2_settings_desc'] = 'Καταστάσεις των παραγγελιών, επιλογές πληρωμών και διανομών';
$_lang['ms2_payment'] = 'Πληρωμή';
$_lang['ms2_payments'] = 'Πληρωμές';
$_lang['ms2_payments_intro'] = 'Μπορείτε να δημιουργήσετε κάθε τύπο πληρωμής. Η λογική της πληρωμής (αποστολή του αγοραστή στην απομακρυσμένη υπηρεσία, λήψη της πληρωμής, κλπ.) εφαρμόζεται στην τάξη που εσείς καθορίζετε.<br/>Για τις μεθόδους πληρωμής η παράμετρος “τάξη” είναι απαραίτητη.';
$_lang['ms2_delivery'] = 'Διανομή';
$_lang['ms2_deliveries'] = 'Διανομές';
$_lang['ms2_deliveries_intro'] = 'Πιθανές παραλλαγές διανομής. Η λογική του υπολογισμού του κόστους παράδοσης ανάλογα μ την απόσταση και το βάρος υλοποιείται από μία κλάση, την οποία εσείς καθορίζετε στις ρυθμίσεις.<br/>Εάν δεν καθορίσετε μία κλάση, οι υπολογισμοί θα γίνουν στον αλγόριθμο από προεπιλογή.';
$_lang['ms2_statuses'] = 'Καταστάσεις';
$_lang['ms2_statuses_intro'] = 'Υπάρχουν αρκετές υποχρεωτικές καταστάσεις της παραγγελίας: "καινούρια", "πληρώθηκε", "εστάλη" and "ακυρώθηκε". Μπορούν να διαμορφωθούν, αλλά δεν μπορούν να αφαιρεθούν, καθώς είναι απαραίτητες για τη λειτουργία του καταστήματος. Μπορείτε να υποδείξετε την κατάστασης σας για μια εκτεταμένη λογική της εργασίας με παραγγελίες.<br/>Η κατάσταση μπορεί να είναι η τελική, που σημαίνει ότι δεν μπορεί να αλλάξει σε άλλη, για παράδειγμα, "εστάλη" and "ακυρώθηκε". Η κατάσταση μπορεί να καθοριστεί, δηλαδή, με αυτό δεν μπορείτε να μεταβείτε σε προηγούμενες καταστάσεις, όπως το "πληρώθηκε" δεν μπορεί να αλλάξει σε "ακινούρια".';
$_lang['ms2_vendors'] = 'Προμηθευτές των προϊόντων';
$_lang['ms2_vendors_intro'] = 'Λίστα των πιθανών κατασκευαστών των προϊόντων. Ό,τι προσθέτετε εδώ, μπορείτε να το επιλέξτε από το πεδίο "Προμηθευτής" των προϊόντων.';
$_lang['ms2_link'] = 'Σύνδεσμος των προϊόντων';
$_lang['ms2_links'] = 'Σύνδεσμοι των προϊόντων';
$_lang['ms2_links_intro'] = 'Η λίστα των πιθανών συνδέσμων των προϊόντων μεταξύ τους. Ο τύπος σύνδεσης περιγράφει ακριβώς πως θα λειτουρήσει, είναι αδύνατο να δημιουργηθεί, μπορείτε μόνο να επιλέξετε από τη λίστα.';
$_lang['ms2_option'] = 'Επιλογή προϊόντων';
$_lang['ms2_options'] = 'Επιλογές προϊόντων';
$_lang['ms2_options_intro'] = 'Λίστα διαθέσιμων επιλογών προϊόντων. Η κατηγορία δέντρο χρησιμοποιείται για τις επιλογές φιλτραρίσματος από τις ελεγχόμενες κατηγορίες.<br/>Για να ορίσετε πολλαπλές επιλογές στις κατηγορίες, θα πρέπει να τις επιλέξετε χρησιμοποιώντας το Ctrl(Cmd) ή το Shift.';
$_lang['ms2_options_category_intro'] = 'Λίστα διαθέσιμων επιλογών προϊόντων στην κατηγορία.';
$_lang['ms2_default_value'] = 'Προεπιλεγμένη τιμή';
$_lang['ms2_customer'] = 'Πελάτης';
$_lang['ms2_all'] = 'Όλα';
$_lang['ms2_type'] = 'Τύπος';

$_lang['ms2_btn_create'] = 'Δημιουργία';
$_lang['ms2_btn_copy'] = 'Αντιγραφή';
$_lang['ms2_btn_save'] = 'Αποθήκευση';
$_lang['ms2_btn_edit'] = 'Επεξεργασία';
$_lang['ms2_btn_view'] = 'Προβολή';
$_lang['ms2_btn_delete'] = 'Διαγραφή';
$_lang['ms2_btn_undelete'] = 'Αναίρεση Διαγραφής';
$_lang['ms2_btn_publish'] = 'Δημοσίευση';
$_lang['ms2_btn_unpublish'] = 'Κατάργηση Δημοσίευσης';
$_lang['ms2_btn_cancel'] = 'Ακύρωση';
$_lang['ms2_btn_back'] = 'Πίσω (alt + &uarr;)';
$_lang['ms2_btn_prev'] = 'Προηγούμενο btn (alt + &larr;)';
$_lang['ms2_btn_next'] = 'Επόμενο btn (alt + &rarr;)';
$_lang['ms2_btn_help'] = 'Βοήθεια';
$_lang['ms2_btn_duplicate'] = 'Αντίγραφο προϊόντος';
$_lang['ms2_btn_addoption'] = 'Προσθήκη επιλογής';
$_lang['ms2_btn_assign'] = 'Εντολή';

$_lang['ms2_actions'] = 'Δράσεις';
$_lang['ms2_search'] = 'Αναζήτηση';
$_lang['ms2_search_clear'] = 'Καθαρισμός';

$_lang['ms2_category'] = 'Κατηγορία των προϊόντων';
$_lang['ms2_category_tree'] = 'Κατηγορία δέντρου';
$_lang['ms2_category_type'] = 'Κατηγορία των προϊόντων';
$_lang['ms2_category_create'] = 'Προσθήκη κατηγορίας';
$_lang['ms2_category_create_here'] = 'Κατηγορία με τα προϊόντα';
$_lang['ms2_category_manage'] = 'Διαχείριση κατηγορίας';
$_lang['ms2_category_duplicate'] = 'Αντιγραφή κατηγορίας';
$_lang['ms2_category_publish'] = 'Δημοσίευση κατηγορίας';
$_lang['ms2_category_unpublish'] = 'Κατάργηση δημοσίευσης κατηγορίας';
$_lang['ms2_category_delete'] = 'Διαγραφή κατηγορίας';
$_lang['ms2_category_undelete'] = 'Αναίρεση διαγραφής κατηγορίας';
$_lang['ms2_category_view'] = 'Προβολή στη σελίδα';
$_lang['ms2_category_new'] = 'Νέα κατηγορία';
$_lang['ms2_category_option_add'] = 'Προσθήκη επιλογής';
$_lang['ms2_category_option_rank'] = 'Σειρά';
$_lang['ms2_category_show_nested'] = 'Προβολή ένθετων προϊόντων';

$_lang['ms2_product'] = 'Προϊόν του καταστήματος';
$_lang['ms2_product_type'] = 'Προϊόν του καταστήματος';
$_lang['ms2_product_create_here'] = 'Προϊόν του καταστήματος';
$_lang['ms2_product_create'] = 'Προσθήκη προϊόντος';

$_lang['ms2_option_type'] = 'Τύπος επιλογής';

$_lang['ms2_frontend_currency'] = 'EUR';
$_lang['ms2_frontend_weight_unit'] = 'pt.';
$_lang['ms2_frontend_count_unit'] = 'pcs.';
$_lang['ms2_frontend_add_to_cart'] = 'Προσθήκη στο καλάθι';
$_lang['ms2_frontend_tags'] = 'Ετικέτες';
$_lang['ms2_frontend_colors'] = 'Χρώματα';
$_lang['ms2_frontend_color'] = 'Χρώμα';
$_lang['ms2_frontend_sizes'] = 'Νούμερα';
$_lang['ms2_frontend_size'] = 'Νούμερο';
$_lang['ms2_frontend_popular'] = 'Δημοφιλή';
$_lang['ms2_frontend_favorite'] = 'Αγαπημένα';
$_lang['ms2_frontend_new'] = 'Νέα';
$_lang['ms2_frontend_deliveries'] = 'Διανομές';
$_lang['ms2_frontend_delivery'] = 'Διανομή';
$_lang['ms2_frontend_payments'] = 'Πληρωμές';
$_lang['ms2_frontend_payment'] = 'Πληρωμή';
$_lang['ms2_frontend_delivery_select'] = 'Επιλογή διανομής';
$_lang['ms2_frontend_payment_select'] = 'Επιλογή πληρωμής';
$_lang['ms2_frontend_credentials'] = 'Αποδεικτικά';
$_lang['ms2_frontend_address'] = 'Διεύθυνση';

$_lang['ms2_frontend_comment'] = 'Σχόλιο';
$_lang['ms2_frontend_receiver'] = 'Παραλήπτης';
$_lang['ms2_frontend_email'] = 'Email';
$_lang['ms2_frontend_phone'] = 'Τηλέφωνο';
$_lang['ms2_frontend_index'] = 'Ταχυδρομικός Κώδικας';
$_lang['ms2_frontend_region'] = 'State/Province';
$_lang['ms2_frontend_city'] = 'Πόλη';
$_lang['ms2_frontend_street'] = 'Δρόμος';
$_lang['ms2_frontend_building'] = 'Κτήριο';
$_lang['ms2_frontend_room'] = 'Δωμάτιο';

$_lang['ms2_frontend_order_cost'] = 'Συνολικό ποσό';
$_lang['ms2_frontend_order_submit'] = 'Ολοκλήρωση αγοράς!';
$_lang['ms2_frontend_order_cancel'] = 'Μορφή ανάπαυσης';
$_lang['ms2_frontend_order_success'] = 'Ευχαριστούμε για τη δημιουργία παραγγελίας <b>#[[+num]]</b> στην ιστοσελίδα μας <b>[[++site_name]]</b>!';

$_lang['ms2_message_close_all'] = 'κλείσιμο όλων';
$_lang['ms2_err_unknown'] = 'Άγνωστο σφάλμα';
$_lang['ms2_err_ns'] = 'Αυτό το πεδίο είναι υποχρεωτικό';
$_lang['ms2_err_ae'] = 'Αυτό το πεδίο πρέπει να είναι μοναδικό';
$_lang['ms2_err_json'] = 'Αυτό το πεδίο απαιτεί JSON string';
$_lang['ms2_err_order_nf'] = 'Η παραγγελία με αυτή την ταυτότητα δεν βρέθηκε.';
$_lang['ms2_err_status_nf'] = 'Η κατάσταση με αυτή την ταυτότητα δεν βρέθηκε.';
$_lang['ms2_err_delivery_nf'] = 'Η διανομή με αυτή την ταυτότητα δε βρέθηκε.';
$_lang['ms2_err_payment_nf'] = 'Η πληρωμή με αυτή την ταυτότητα δε βρέθηκε.';
$_lang['ms2_err_status_final'] = 'Η τελική κατάσταση έχει οριστεί, δεν μπορείτε να την αλλάξετε.';
$_lang['ms2_err_status_fixed'] = 'Η τελική κατάσταση έχει οριστεί. Δεν μπορείτε να την αλλάξετε σε προηγούμενη κατάσταση.';
$_lang['ms2_err_status_wrong'] = 'Λάθος κατάσταση της παραγγελίας.';
$_lang['ms2_err_status_same'] = 'Αυτή η κατάσταση έχει ήδη οριστεί.';
$_lang['ms2_err_register_globals'] = 'Σφάλμα: php παράμετρος <b>register_globals</b> πρέπει να απενεργοποιηθούν.';
$_lang['ms2_err_link_equal'] = 'Προσπαθείτε να προσθέσετε σύνδεσμο προϊόντος στον εαυτό του';
$_lang['ms2_err_value_duplicate'] = 'Δεν έχετε προσθέσει τιμή ή έχετε προσθέσει ένα αντίγραφο.';

$_lang['ms2_err_gallery_save'] = 'Δεν γίνεται να αποθηκευτεί το αρχείο';
$_lang['ms2_err_gallery_ns'] = 'Δε γίνεται να διαβαστεί το αρχείο';
$_lang['ms2_err_gallery_ext'] = 'Λάθος επέκταση αρχείου';
$_lang['ms2_err_gallery_thumb'] = 'Δεν ήταν δυνατή η δημιουργία μικρογραφιών. Ανατρέξτε στο αρχείο καταγραφής συστήματος για λεπτομέρειες.';
$_lang['ms2_err_gallery_exists'] = 'Μία τέτοια εικόνα είναι ήδη στη συλλογή προϊόντων.';
$_lang['ms2_err_wrong_image'] = 'Το αρχείο δεν είναι έγκυρη εικόνα.';

$_lang['ms2_email_subject_new_user'] = 'Κάνατε την παραγγελία σας #[[+num]] στο [[++site_name]]';
$_lang['ms2_email_subject_new_manager'] = 'Έχετε μία νέα παραγγελία #[[+num]]';
$_lang['ms2_email_subject_paid_user'] = 'Έχετε πληρώσει για την παραγγελία #[[+num]]';
$_lang['ms2_email_subject_paid_manager'] = 'Η παραγγελία #[[+num]]  πληρώθηκε';
$_lang['ms2_email_subject_sent_user'] = 'Η παραγγελία σας #[[+num]] εστάλη';
$_lang['ms2_email_subject_cancelled_user'] = 'Η παραγγελία σας #[[+num]] ακυρώθηκε';

$_lang['ms2_payment_link'] = 'Αν κατά λάθος ακυρώσετε την παραγγελία σας, μπορείτε πάντα <a href="[[+link]]" style="color:#348eda;">να την συνεχίστε σε αυτόν τον σύνδεσμο</a>.';

$_lang['ms2_category_err_ns'] = 'Η κατηγορία δεν έχει προσδιοριστεί';
$_lang['ms2_option_err_ns'] = 'Η επιλογή δεν έχει προσδιοριστεί';
$_lang['ms2_option_err_nf'] = 'Η επιλογή δεν βρέθηκε';
$_lang['ms2_option_err_ae'] = 'Η επιλογή υπάρχει ήδη';
$_lang['ms2_option_err_save'] = 'Ένα λάθος τη στιγμή που αποθηκεύατε την επιλογή';
$_lang['ms2_option_err_reserved_key'] = 'Το κλειδί επιλογή είναι κατοχυρωμένο';
$_lang['ms2_option_err_invalid_key'] = 'Το κλειδί επιλογή είναι μη έγκυρο';
