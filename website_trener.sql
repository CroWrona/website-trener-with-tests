-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 24, 2024 at 05:31 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_trener`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `additional_content`
--

CREATE TABLE `additional_content` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description_title` varchar(255) NOT NULL,
  `description_text` text NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `side` enum('left','right') NOT NULL DEFAULT 'left',
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_content`
--

INSERT INTO `additional_content` (`id`, `image_url`, `description_title`, `description_text`, `path`, `side`, `active`) VALUES
(1, 'https://images.pexels.com/photos/10893885/pexels-photo-10893885.jpeg?auto=compress&cs=tinysrgb&w=800', 'Tomasz II Demko - profil trenera', 'Cześć nazywam się Tomasz II, jestem absolwentem Akademii mistrzostwa sportowego.\nPrzygodę ze sportem zaczynałem od trenowania piłki nożnej i sztuk walki jednak z czasem moje zainteresowania skupiły się na kształtowaniu swojej sylwetki co stało się moja pasja i stylem życia.\nDlatego jestem czynnym zawodnikiem sportów sylwetkowych i wiąże z tym swoją przyszłość.\nJestem trenerem z pasji dlatego moi podopieczni są dla mnie najważniejsi.\nJeśli chcesz zmienić swoją sylwetkę zapraszam do kontaktu!\nPokażę Ci jak bezpiecznie i zdrowo trenować, aby osiągnąć swój cel.\nJedyny warunek to chęć do działania.\nJesteś gotowy do pracy? Mnie to wystarczy, resztą zajmę się ja!', 'blog_hidden.php?id=3', 'left', 1),
(2, 'https://trainingshowroom.com/img/cms/BLOG/muscular-young-woman-doing-workout-at-gym-PD37X2U.jpg', 'description title', 'description text description text description text description text description text description text description text description text description text description text description text description text description text description text description text description text ', '', 'right', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `user_id`, `token`, `created_at`, `location`) VALUES
(76, 1, 'b9ded694a3948328a76caf23a10de1a3923080fa286683149473ada55e64a36b', '2024-03-01 23:35:42', 'mobile');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `full_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `likes` int(11) DEFAULT 0,
  `comment_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `image_url`, `short_description`, `full_text`, `created_at`, `active`, `likes`, `comment_active`) VALUES
(1, 'Jak zacząć swoją przygodę z bieganiem', 'https://www.planetfitness.com/sites/default/files/feature-image/SEO%20Blog%20Article_Header%20Image_A%20Beginner%20Workout%20Plan%20for%20Your%20First%20Week%20in%20the%20Gym.jpg', 'Odkryj podstawowe kroki, które pomogą Ci rozpocząć trening biegowy. Przeczytaj więcej!', 'Zacząć bieganie może być trudno, ale nie jest niemożliwe. W tym wpisie omówimy podstawowe techniki i porady, które pomogą Ci zacząć swoją przygodę z bieganiem. Kliknij, aby dowiedzieć się więcej o korzyściach z biegania, planach treningowych i zasadach bezpieczeństwa.', '2024-02-24 19:12:31', 1, 14, 1),
(2, 'Zdrowa dieta na co dzień', 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362', 'Odkryj, jakie produkty wprowadzić do swojej codziennej diety, aby poprawić swoje samopoczucie.', 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.', '2024-02-24 19:12:31', 1, 2, 1),
(3, 'Wiecej o mnie', 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&cs=tinysrgb&w=800', '', 'Wiecej o mnie\ncos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tam', '2024-02-24 19:12:31', 0, 0, 1),
(4, 'Zdrowa dieta na co dzień', 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362', 'Odkryj, jakie produkty wprowadzić do swojej codziennej diety, aby poprawić swoje samopoczucie.', 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.', '2024-02-24 19:12:31', 0, 0, 1),
(5, 'Zdrowa dieta na co dzień', 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362', 'Odkryj, jakie produkty wprowadzić do swojej codziennej diety, aby poprawić swoje samopoczucie.', 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.', '2024-02-24 19:12:31', 0, 0, 1),
(6, 'Techniki relaksacyjne na stresujący dzień', '', 'Odkryj proste techniki relaksacyjne, które pomogą Ci odprężyć się i zregenerować po ciężkim dniu.', 'Codzienne życie może być stresujące, ale istnieją proste techniki relaksacyjne, które możesz stosować, aby odprężyć się i zregenerować. W tym wpisie omówimy techniki oddychania, medytacji i relaksacji, które pomogą Ci zachować spokój i równowagę.', '2024-02-25 16:36:36', 1, 2, 1),
(7, 'Jak poprawić jakość snu', '', 'Poznaj skuteczne strategie, które pomogą Ci lepiej spać i wypocząć każdej nocy.', 'Sen odgrywa kluczową rolę w naszym zdrowiu i samopoczuciu. W tym artykule omówimy skuteczne strategie, które pomogą Ci poprawić jakość snu i wypocząć każdej nocy. Dowiedz się o zdrowych nawykach snu, technikach relaksacyjnych i sposobach radzenia sobie z bezsennością.', '2024-02-25 16:37:09', 1, 1, 1),
(8, 'Korzyści z regularnej aktywności fizycznej', '', 'Odkryj, jak regularna aktywność fizyczna może korzystnie wpłynąć na Twoje zdrowie i samopoczucie.', 'Regularna aktywność fizyczna jest kluczowa dla zdrowia i samopoczucia. W tym artykule omówimy główne korzyści płynące z regularnej aktywności fizycznej, takie jak poprawa kondycji serca, redukcja stresu, kontrola wagi i poprawa nastroju. Przeczytaj więcej, aby dowiedzieć się, jak wprowadzić więcej ruchu do swojego codziennego życia.', '2024-02-25 16:37:28', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bottom_right_message`
--

CREATE TABLE `bottom_right_message` (
  `id` int(11) NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `message_content` text NOT NULL,
  `button_text` varchar(100) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bottom_right_message`
--

INSERT INTO `bottom_right_message` (`id`, `message_title`, `message_content`, `button_text`, `button_link`, `active`, `image_link`) VALUES
(1, 'PIERWSZE KONSULTACJE DARMOWE!', 'Umów się na pierwsze spotkanie, na którym chętnie odpowiemy na Twoje wszystkie pytania i omówimy szczegóły.', 'Skontaktuj się teraz', 'https://github.com/CroWrona', 1, 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_text`, `created_at`, `likes`) VALUES
(15, 2, 'Test2', '2024-06-24 15:30:55', 1),
(17, 8, 'Test4', '2024-06-24 15:31:15', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_data`
--

CREATE TABLE `contact_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `goal` enum('lose_weight','gain_weight','stay_healthy','other') NOT NULL,
  `other_goal` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `active`) VALUES
(1, 'Jakie są korzyści wynikające z treningów personalnych?', 'Treningi personalne pozwalają na indywidualne podejście do potrzeb klienta, intensywną pracę nad osiągnięciem celów fitnessowych oraz regularną motywację.', 1),
(2, 'Jak często powinienem/a korzystać z usług trenera personalnego?', 'Częstotliwość treningów zależy od Twoich celów, aktualnego stanu zdrowia i czasu, który jesteś w stanie poświęcić na treningi. Zazwyczaj zaleca się ćwiczenia 2-3 razy w tygodniu.', 1),
(3, 'Jak długo trwają sesje treningowe?', 'Długość sesji treningowej zależy od indywidualnych potrzeb klienta oraz planu treningowego opracowanego przez trenera personalnego. Zazwyczaj sesja trwa od 45 minut do 1 godziny.', 1),
(4, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(5, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(6, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(7, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(8, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(9, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1),
(10, 'Czy potrzebuję jakiegoś specjalnego wyposażenia do treningów personalnych?', 'Wyposażenie potrzebne do treningów personalnych zależy od rodzaju ćwiczeń i preferencji trenera oraz klienta. Często wykorzystuje się hantle, matę do ćwiczeń, taśmę oporową i piłkę fitness.', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `footerinfo`
--

CREATE TABLE `footerinfo` (
  `FooterID` int(11) NOT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `ContactEmail` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TermsOfServiceLink` varchar(255) DEFAULT NULL,
  `PrivacyPolicyLink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footerinfo`
--

INSERT INTO `footerinfo` (`FooterID`, `CompanyName`, `ContactEmail`, `PhoneNumber`, `LastUpdated`, `TermsOfServiceLink`, `PrivacyPolicyLink`) VALUES
(1, '© 2024 Nazwa Twojej Firmy. Wszelkie prawa zastrzeżone.', 'email@gmail.com', '111 111 111', '2024-06-24 15:26:37', 'terms_of_service.php', 'privacy_policy.php');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `icon`
--

CREATE TABLE `icon` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `icon`, `path`, `active`) VALUES
(1, 'fas fa-envelope', 'https://github.com/CroWrona', 1),
(2, 'fab fa-facebook text-black', 'contact.php', 0),
(3, 'fab fa-instagram text-black', 'contact.php', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `my_advantages`
--

CREATE TABLE `my_advantages` (
  `id` int(11) NOT NULL,
  `emoticon` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_advantages`
--

INSERT INTO `my_advantages` (`id`, `emoticon`, `title`, `description`, `active`) VALUES
(1, '<i class=\"far fa-check-square\"></i>', 'Wsparcie, Empatia, Motywacja', 'Nieraz rozmowa jest ważniejsza od treningu i da o wiele więcej przy osiąganiu celu - rozwiązaniu problemu', 0),
(2, '<i class=\"far fa-check-square\"></i>', 'Inspiracja i Motywacja', 'Codzienna praca nad sobą prowadzi do osiągnięcia wielkich celów.', 1),
(3, '<i class=\"far fa-check-square\"></i>', 'Zaufanie i Dostępność', 'Zawsze jestem dostępny, aby wesprzeć cię w osiągnięciu twoich celów.', 0),
(4, '<i class=\"far fa-check-square\"></i>', 'Profesjonalne doradztwo', 'Oferuję indywidualne i profesjonalne podejście do każdego klienta.', 1),
(5, '<i class=\"far fa-check-square\"></i>', 'Wsparcie na każdym etapie', 'Pomogę ci zmotywować się i utrzymać wysoki poziom energii.', 1),
(6, '<i class=\"far fa-check-square\"></i>', 'Elastyczne podejście', 'Moje podejście jest elastyczne i dopasowane do twoich potrzeb.', 1),
(7, '<i class=\"far fa-check-square\"></i>', 'Zawsze dostępny', 'Jestem dostępny 24/7, aby odpowiedzieć na twoje pytania i wesprzeć cię.', 1),
(8, '<i class=\"far fa-check-square\"></i>', 'Niezawodne wsparcie', 'Możesz polegać na mnie, aby pomóc ci pokonać każdą przeszkodę.', 0),
(9, '<i class=\"far fa-check-square\"></i>', 'Pozytywne podejście', 'Stawiam na pozytywną energię i motywację w osiąganiu celów.', 1),
(10, '<i class=\"far fa-check-square\"></i>', 'Wsparcie na każdym kroku', 'Nie zostawiam cię samego. Jestem tutaj, aby cię wesprzeć na każdym etapie Twojej drogi.', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nav_links`
--

CREATE TABLE `nav_links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nav_links`
--

INSERT INTO `nav_links` (`id`, `title`, `path`, `active`) VALUES
(1, 'Strona główna', 'index.php', 1),
(2, 'Blog', 'blog.php', 1),
(3, 'FAQ', 'faq.php', 1),
(4, 'Kontakt', 'contact.php', 1),
(5, 'Github', 'https://github.com/CroWrona', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `PolicyID` int(11) NOT NULL,
  `PolicyText` text DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacypolicy`
--

INSERT INTO `privacypolicy` (`PolicyID`, `PolicyText`, `LastUpdated`) VALUES
(1, 'Zbierane informacje: W ramach korzystania ze strony internetowej oraz formularza kontaktowego gromadzę informacje osobiste, takie jak imię, numer telefonu i adres e-mail, które są dobrowolnie udostępniane przez użytkowników.\r\n\r\nCel zbierania danych: Dane osobowe są zbierane w celu umożliwienia kontaktu z użytkownikami w odpowiedzi na ich zapytania dotyczące treningów personalnych oraz w celach komunikacyjnych związanych z usługami fitness.\r\n\r\nUżytkowanie informacji: Informacje osobiste nie będą udostępniane, sprzedawane ani wypożyczane osobom trzecim bez wyraźnej zgody użytkownika, chyba że wymaga tego prawo lub jest to konieczne do świadczenia usług związanych z treningami personalnymi.\r\n\r\nBezpieczeństwo danych: Podjęte zostaną odpowiednie środki bezpieczeństwa, aby chronić dane osobowe przed nieautoryzowanym dostępem, utratą, wykorzystaniem lub ujawnieniem.\r\n\r\nPrawa użytkowników: Użytkownicy mają prawo żądać dostępu do swoich danych osobowych, ich poprawiania, usuwania lub ograniczenia przetwarzania, a także mają prawo do przenoszenia danych.\r\n\r\nCookies: Strona może korzystać z plików cookie w celu ułatwienia korzystania z witryny oraz analizy ruchu na stronie. Użytkownicy mają możliwość zarządzania ustawieniami dotyczącymi plików cookie w swojej przeglądarce.\r\n\r\nZmiany w polityce prywatności: Polityka prywatności może być okresowo aktualizowana lub zmieniana. Wszelkie istotne zmiany będą publikowane na tej stronie.', '2024-02-25 21:12:25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `termsofservice`
--

CREATE TABLE `termsofservice` (
  `TermsID` int(11) NOT NULL,
  `TermsText` text DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termsofservice`
--

INSERT INTO `termsofservice` (`TermsID`, `TermsText`, `LastUpdated`) VALUES
(1, 'Korzystanie z witryny: Korzystając z tej strony internetowej, użytkownicy akceptują niniejszy regulamin oraz politykę prywatności.\r\n\r\nOdpowiedzialność: Nie ponoszę odpowiedzialności za treści zamieszczone przez użytkowników na stronie, ani za szkody wynikłe z korzystania z informacji zawartych na tej stronie.\r\n\r\nTreści chronione prawem autorskim: Wszystkie treści, materiały i zasoby zamieszczone na tej stronie są chronione prawami autorskimi i należą do mnie, chyba że wskazano inaczej. Wykorzystywanie tych treści bez mojej zgody jest zabronione.\r\n\r\nKomunikacja: Użytkownicy mogą kontaktować się ze mną za pośrednictwem formularza kontaktowego lub podanych danych kontaktowych w celu umówienia się na trening personalny lub uzyskania dodatkowych informacji.\r\n\r\nZmiany w regulaminie: Regulamin strony może być aktualizowany lub zmieniany. Użytkownicy zostaną poinformowani o istotnych zmianach.\r\n\r\nDeklaruję, że jestem osobą fizyczną prowadzącą działalność jako trener personalny, a ta strona internetowa służy głównie jako narzędzie komunikacji z klientami zainteresowanymi treningami personalnymi. W przypadku jakichkolwiek pytań dotyczących polityki prywatności lub regulaminu, proszę o kontakt za pośrednictwem formularza kontaktowego lub podanych danych kontaktowych.', '2024-02-25 21:12:40');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tiles`
--

CREATE TABLE `tiles` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `size` enum('small','medium','large') DEFAULT 'medium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiles`
--

INSERT INTO `tiles` (`id`, `image`, `title`, `note`, `link`, `date_added`, `active`, `size`) VALUES
(1, 'https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', 'Indywidualne podejście', 'Dostosowane treningi i plany żywieniowe zapewniające optymalne rezultaty z uwzględnieniem Twoich celów i ograniczeń fizycznych.', 'blog_single.php?id=1', '2024-02-24 16:24:46', 1, 'small'),
(2, 'https://img.freepik.com/free-photo/3d-gym-equipment_23-2151114163.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1708732800&semt=sph', 'Motywacja i wsparcie', 'Profesjonalny trener personalny nie tylko motywuje, ale także dostarcza wskazówek i wsparcia niezbędnego do utrzymania ciągłości treningów i osiągnięcia postawionych celów.', 'blog_single.php?id=2', '2024-02-24 16:24:46', 1, 'medium'),
(3, 'https://media.istockphoto.com/id/1438034462/photo/latino-and-african-sport-woman-exercising-and-build-muscle-in-stadium-active-strong-beautiful.jpg?s=612x612&w=0&k=20&c=kFwCRkh8Q1v6uCoSTL7sQcsbk02zgSZJ1kDgnJ3DAZc=', 'Skuteczność', 'wsparcia niezbędnego do utrzymania ciągłości treningów i osiągnięcia postawionych celów.', 'contact.php', '2024-02-24 16:24:46', 1, 'medium'),
(4, 'https://images.pexels.com/photos/1638324/pexels-photo-1638324.jpeg?auto=compress&cs=tinysrgb&w=800', 'Motywacja', 'Motywacja i wsparcie: Profesjonalny trener personalny nie tylko motywuje, ale także dostarcza wskazówek', 'blog_hidden.php?id=4', '2024-02-24 16:24:46', 1, 'small'),
(5, 'https://images.pexels.com/photos/949131/pexels-photo-949131.jpeg?auto=compress&cs=tinysrgb&w=800', 'Siła', 'Motywacja i wsparcie: Profesjonalny trener personalny nie tylko motywuje, ale także dostarcza wskazówek i wsparcia niezbędnego do utrzymania ciągłości treningów i osiągnięcia postawionych celów.', 'blog_hidden.php?id=5', '2024-02-24 16:24:46', 1, 'large'),
(6, 'https://media.istockphoto.com/id/1438034462/photo/latino-and-african-sport-woman-exercising-and-build-muscle-in-stadium-active-strong-beautiful.jpg?s=612x612&w=0&k=20&c=kFwCRkh8Q1v6uCoSTL7sQcsbk02zgSZJ1kDgnJ3DAZc=', 'Cos niecoś potrafie', NULL, 'blog_hidden.php?id=4', '2024-02-24 16:24:46', 0, 'medium'),
(7, 'https://media.istockphoto.com/id/1438034462/photo/latino-and-african-sport-woman-exercising-and-build-muscle-in-stadium-active-strong-beautiful.jpg?s=612x612&w=0&k=20&c=kFwCRkh8Q1v6uCoSTL7sQcsbk02zgSZJ1kDgnJ3DAZc=', 'Byk jakich mało', NULL, 'blog_hidden.php?id=5', '2024-02-24 16:24:46', 0, 'large');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`, `created_at`) VALUES
(1, 'a', 'a@a', 'a', 'user', '2024-03-01 20:34:15');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `additional_content`
--
ALTER TABLE `additional_content`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `bottom_right_message`
--
ALTER TABLE `bottom_right_message`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `contact_data`
--
ALTER TABLE `contact_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `footerinfo`
--
ALTER TABLE `footerinfo`
  ADD PRIMARY KEY (`FooterID`);

--
-- Indeksy dla tabeli `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `my_advantages`
--
ALTER TABLE `my_advantages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `nav_links`
--
ALTER TABLE `nav_links`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`PolicyID`);

--
-- Indeksy dla tabeli `termsofservice`
--
ALTER TABLE `termsofservice`
  ADD PRIMARY KEY (`TermsID`);

--
-- Indeksy dla tabeli `tiles`
--
ALTER TABLE `tiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_content`
--
ALTER TABLE `additional_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bottom_right_message`
--
ALTER TABLE `bottom_right_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_data`
--
ALTER TABLE `contact_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `footerinfo`
--
ALTER TABLE `footerinfo`
  MODIFY `FooterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `my_advantages`
--
ALTER TABLE `my_advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nav_links`
--
ALTER TABLE `nav_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `PolicyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termsofservice`
--
ALTER TABLE `termsofservice`
  MODIFY `TermsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiles`
--
ALTER TABLE `tiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
