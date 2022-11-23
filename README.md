### About CMS
PapixCMS was created using metin2cms.cf by IonutRO as the basis.

The goal of this project was to make a quality website available for free to everyone who wants to open a metin2 server.

Several changes have been made in order to improve performance and security.


### Changelog
**v1**
- Added timeout on connection to the database. (Note: If the timeout time is not entered in case the database connection fail it create an infinite loop that may underload the hosting).
- Metin2cms API system and all components linked to the api removed (Note: The site performance has improved by 100% when removing all api components).
- Fixed XSS exploits (Donate and ranking guilds/players)
- Fix SendEmail.
- Recaptcha v2 in login, register, password recovery and change email.
- Choose the recaptcha theme.
- Change in account creation, passwords must contain only numbers and letters and must be between 5 and 16 characters long.
- Multilingual adapted to friendly URL’s.
- System for easy installation of new themes.
- Option for users to choose the theme of the site with ON/OFF option in the admin panel.
- Fake statistics geral and guilds.
