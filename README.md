### About CMS
PapixCMS was created using metin2cms.cf by IonutRO as the basis.

The goal of this project was to make a quality website available for free to everyone who wants to open a metin2 server.

Several changes have been made in order to improve performance and security.

## Documentation
[Changelog](https://github.com/papix2020/PapixCMS#changelog "Changelog")

[Setup](https://github.com/papix2020/PapixCMS#setup "Setup")
[Use Thematic](https://github.com/papix2020/PapixCMS#use-thematic "Use Thematic")
[Use Fake Statistics](https://github.com/papix2020/PapixCMS#use-fake-statistics "Use Fake Statistics")
[Add New Languages](https://github.com/papix2020/PapixCMS#add-new-languages "Add New Languages")
[Add New Themes](https://github.com/papix2020/PapixCMS#add-new-themes "Add New Themes")


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

### Setup
1º: After downloading the CMS and placing it on your web host, open the config.php file in the root directory.

2º: Change the URL of the site with yours on line 3.

3º: Edit lines 6, 7 and 8 with your login data for your server database.

4º: Edit lines 14, 15, 16, 17, 18, and 19 with your SMTP server.

5º: Edit line 34 and 35 with your recaptcha v2 credentials (You dont have? Click here to create).

6º: Choose the Recaptcha v2 style on line 36 (dark or light).

7º: Put your account with administrative permissions into the database (account > account > Table web_admin > change the value on your account to 9).

8º: Login to your account and go to the Administration option via the menu after login and in General settings click on Edit site information and put your server name.


### Use Thematic
1º: Open /config.php and on line 31 change 0 to 1 in christmas value.


### Use Fake Statistics
1º: Open /config.php and on line 27 and 28 change false to true in fake_stats_geral and fake_stats_guild.

2º: Change the value in FAKE_STATS_GERAL and FAKE_STATS_GUILD with the number you want to multiply the real values.

 
##### Example
define(“FAKE_STATS_GERAL“, “2“);
define(“FAKE_STATS_GUILD“, “2“);

In this example if you put 2 the actual numbers are multiplied by 2 (if there are 5 accounts it will show 10 in the statistics and the same for the number of guilds).


### Add New Languages
In this example I will add the Portuguese language (PT) to the CMS.

1º: Go to the directory /include/languages and duplicate for example the file en.php with the name pt.php.

2º: Translate the pt.php file to your liking.

3º: Go to the directory /include/db and open the file languages.json and add the desired country name and tag.


![](https://i.epvpimg.com/E4Vncab.png)

Done, your new language has been added to the CMS.


### Add New Themes

1º: Go to the directory /themes and duplicate for example the folder 1 with the name 4. 

2º: Edit the files inside folder 4 to your liking.

3º: Go to the directory /themes/4/css and open the file costume.css and edit lines 3, 6, 7, 10, 11 and 12 with the colors you want.

For example, we will make the theme colors purple.

![](https://i.epvpimg.com/OPmDbab.png)

4º: Go to the directory /include/db and open the file themes.json and add the line for your new theme. 

![](https://i.epvpimg.com/ivOrbab.png)

Done, your new theme has been added to the CMS.
