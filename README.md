gw2daily_symfony
================

A Symfony project created on June 29, 2016, 5:52 pm.

----------------

Skrótowy opis:

>Aplikacja pobiera obiekt JSON zawierający dane o aktualnych zadaniach do wykonania spod adresu:
https://api.guildwars2.com/v2/achievements/daily
Po czym z tego obiektu pobiera numery ID poszczególnych zadań podzielonych na trzy kategorie i wykorzystuje je do znalezienia 
bardziej szczegółowych informacji.
Przykładowo:
https://api.guildwars2.com/v2/achievements?ids=1975,1939,1964,1967,1881,1856,1861,2116,2101,946,1849,1850,1843

----------------

Implementacja:

> Kontroler odpowiedzialny za przepływ danych i wywołanie szablonu TWIG HTML z odpowiednimi wartościami znajduje się w pliku:
https://github.com/hkryspin/gw2daily_symfony/blob/master/src/AppBundle/Controller/DefaultController.php

Inicjowany jest obiekt klasy GwApi obsługującej żądania HTTP za pomocą biblioteki GuzzleHttp:
https://github.com/hkryspin/gw2daily_symfony/blob/master/src/AppBundle/Model/GwApi.php

Klasy obsługujące konkretne węzły końcowe oficjalnego API są opakowane w odpowiednie metody dailies() i achievements().

Owe klasy czyli DailyEndpoint i AchievementEndpoint:
https://github.com/hkryspin/gw2daily_symfony/blob/master/src/AppBundle/Model/DailyEndpoint.php
https://github.com/hkryspin/gw2daily_symfony/blob/master/src/AppBundle/Model/AchievementEndpoint.php

Rozszerzają abstrakcyjną klasę Endpoint:
https://github.com/hkryspin/gw2daily_symfony/blob/master/src/AppBundle/Model/Endpoint.php
Implementując metodę url().

Klasa Endpoint wysyła żądania i odbiera odpowiedzi za pomocą obiektu GuzzleHttp\Client zainicjowanego w GwApi.
