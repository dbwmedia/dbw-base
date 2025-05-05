import '../../../node_modules/slick-carousel/slick/slick.min';

const Slick = () => {
		jQuery('.slider--ec').slick({
				dots: true,
				loop: true,
				arrows: true,
				infinite: true,
				autoplay: false,
				pauseOnHover: true,
				useTransform: false,
				autoplaySpeed: 5000,
				variableWidth: true,
		});

}
export default Slick;