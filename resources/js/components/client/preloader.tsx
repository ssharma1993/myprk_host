export default function Preloader() {
    return (
        <>
            <div className="custom-cursor__cursor" />
            <div className="custom-cursor__cursor-two" />
            <div className="preloader">
                <div
                    className="preloader__image"
                    style={{
                        backgroundImage:
                            'url(/client/assets/images/loader.png)',
                    }}
                />
            </div>
        </>
    );
}
