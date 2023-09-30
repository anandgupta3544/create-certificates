#table required
1-users(id,fullname,email,created_at,updated_at) -> DONE

2-certificates(id,user_id,certificate_number,event_name,date_of_event,organizer_name,organizer_email,website_url,head_name,mentor_name,created_at,updated_at) -> DONE

#functions required
1-generate certificate as pdf.
2-send certificate on user email with attached certificate pdf.

#view page
1-email template with following dynamic values -> (username,ogranizer_name,certificate_number,website_link,signature_of_organizer,address)
