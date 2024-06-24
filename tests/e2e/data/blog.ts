export interface BlogPost {
    id: number;
    blogType: string;
    title: string;
    date: string;
    shortContent: string;
    content: string;
    image: string;
}

export const blog_post: BlogPost[] = [
    {
        id: 1,
        blogType: 'blog_single',
        title: 'Jak zacząć swoją przygodę z bieganiem',
        date: '2024-02-24 20:12:31',
        shortContent: 'Odkryj podstawowe kroki, które pomogą Ci rozpocząć trening biegowy. Przeczytaj więcej!',
        content: 'Zacząć bieganie może być trudno, ale nie jest niemożliwe. W tym wpisie omówimy podstawowe techniki i porady, które pomogą Ci zacząć swoją przygodę z bieganiem. Kliknij, aby dowiedzieć się więcej o korzyściach z biegania, planach treningowych i zasadach bezpieczeństwa.',
        image: 'https://www.planetfitness.com/sites/default/files/feature-image/SEO%20Blog%20Article_Header%20Image_A%20Beginner%20Workout%20Plan%20for%20Your%20First%20Week%20in%20the%20Gym.jpg'
    },
    {
        id: 2,
        blogType: 'blog_single',
        title: 'Zdrowa dieta na co dzień',
        date: '2024-02-24 20:12:31',
        shortContent: 'Odkryj, jakie produkty wprowadzić do swojej codziennej diety, aby poprawić swoje samopoczucie.',
        content: 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.',
        image: 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362'
    },
    {
        id: 3,
        blogType: 'blog_hidden',
        title: 'Wiecej o mnie',
        date: '',
        shortContent: '',
        content: 'Wiecej o mnie cos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tamcos tam cos tam',
        image: 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&cs=tinysrgb&w=800'
    },
    {
        id: 4,
        blogType: 'blog_hidden',
        title: 'Zdrowa dieta na co dzień',
        date: '',
        shortContent: '',
        content: 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.',
        image: 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362'
    },
    {
        id: 5,
        blogType: 'blog_hidden',
        title: 'Zdrowa dieta na co dzień',
        date: '',
        shortContent: '',
        content: 'Dieta odgrywa kluczową rolę w naszym codziennym życiu. W tym wpisie dowiesz się, jakie produkty wprowadzić do swojej diety, aby poprawić samopoczucie, zdrowie i energię. Przeczytaj, aby poznać wskazówki dotyczące planowania posiłków, zdrowych przekąsek i unikania pułapek dietetycznych.',
        image: 'https://assets.sweat.com/shopify_articles/images/010/005/285/original/BackToGymSWEATf1f07a7f6f79e7b8807d2436a6ae8e8b.jpg?1625801362'
    },
    {
        id: 6,
        blogType: 'blog_single',
        title: 'Techniki relaksacyjne na stresujący dzień',
        date: '2024-02-25 17:36:36',
        shortContent: '',
        content: 'Codzienne życie może być stresujące, ale istnieją proste techniki relaksacyjne, które możesz stosować, aby odprężyć się i zregenerować. W tym wpisie omówimy techniki oddychania, medytacji i relaksacji, które pomogą Ci zachować spokój i równowagę.',
        image: ''
    },
    {
        id: 7,
        blogType: 'blog_single',
        title: 'Jak poprawić jakość snu',
        date: '2024-02-25 17:37:09',
        shortContent: '',
        content: 'Sen odgrywa kluczową rolę w naszym zdrowiu i samopoczuciu. W tym artykule omówimy skuteczne strategie, które pomogą Ci poprawić jakość snu i wypocząć każdej nocy. Dowiedz się o zdrowych nawykach snu, technikach relaksacyjnych i sposobach radzenia sobie z bezsennością.',
        image: ''
    },
    {
        id: 8,
        blogType: 'blog_single',
        title: 'Korzyści z regularnej aktywności fizycznej',
        date: '2024-02-25 17:37:28',
        shortContent: '',
        content: 'Regularna aktywność fizyczna jest kluczowa dla zdrowia i samopoczucia. W tym artykule omówimy główne korzyści płynące z regularnej aktywności fizycznej, takie jak poprawa kondycji serca, redukcja stresu, kontrola wagi i poprawa nastroju. Przeczytaj więcej, aby dowiedzieć się, jak wprowadzić więcej ruchu do swojego codziennego życia.',
        image: ''
    },
];