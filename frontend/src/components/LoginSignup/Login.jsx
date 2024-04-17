import React, { useState } from 'react';
import styled from "styled-components";
import { gsap } from "gsap";

export default function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleLogin = async (event) => {
    event.preventDefault();
    // Add your login logic here
  };

  // GSAP animation for the button
  const animateButton = () => {
    gsap.to(ButtonStyled, { backgroundColor: "#F00", duration: 0.5 });
  };

  return (
    <Div>
      <Div2>
        <Div3>Bonjour!!</Div3>
        <Div4>Veuillez saisir vos coordonnées.</Div4>
        <Div5>Email</Div5>
        <InputStyled type="email" placeholder="Enter your email" onChange={(e) => { setEmail(e.target.value) }} />
        <Div7>Password</Div7>
        <InputStyled type="password" placeholder="**********" onChange={(e) => { setPassword(e.target.value) }} />
        <Div9>
          <Div10>
            <Div11 type="checkbox" />
          </Div10>
          <Div13>Mot de passe oublié</Div13>
        </Div9>
        <ButtonStyled onClick={animateButton}>Login</ButtonStyled>
      </Div2>
    </Div>
  );
}

const Div = styled.div`
  justify-content: center;
  align-items: center;
  display: flex;
  color: #636364;
  font-weight: 500;
  text-align: center;
  padding: 80px 20px; /* Adjusted padding */
`;

const Div2 = styled.div`
  display: flex;
  margin-top: 40px;
  width: 100%; /* Adjusted width */
  max-width: 577px; /* Adjusted max-width */
  flex-direction: column;
`;

const Div3 = styled.div`
  color: #030303;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  font: 40px Poppins, sans-serif;
`;

const Div4 = styled.div`
  letter-spacing: 0.42px;
  font: 400 14px Poppins, sans-serif;
`;

const Div5 = styled.div`
  color: #181818;
  letter-spacing: 0.42px;
  margin-top: 20px; /* Adjusted margin-top */
  font: 14px Poppins, sans-serif;
`;

const InputStyled = styled.input`
  border-radius: 12px;
  box-shadow: 0px 4px 10px 0px rgba(0, 0, 0, 0.25);
  border-color: rgba(0, 0, 0, 0.25);
  border-style: solid;
  border-width: 1px;
  background-color: rgba(196, 196, 196, 0);
  margin-top: 11px;
  letter-spacing: 0.72px;
  padding: 15px 11px; /* Adjusted padding */
  font: 300 18px Poppins, sans-serif; /* Adjusted font size */
`;

const Div7 = styled.div`
  color: #181818;
  letter-spacing: 0.42px;
  margin-top: 20px; /* Adjusted margin-top */
  font: 14px Poppins, sans-serif;
`;

const Div9 = styled.div`
  display: flex;
  margin-top: 20px; /* Adjusted margin-top */
  gap: 20px;
  color: #181818;
`;

const Div10 = styled.div`
  display: flex;
  gap: 10px; /* Adjusted gap */
  align-items: center; /* Added alignment */
`;

const Div11 = styled.input`
  border-radius: 4px;
  border-color: rgba(0, 0, 0, 0.25);
  border-style: solid;
  border-width: 1px;
  background-color: rgba(196, 196, 196, 0);
  width: 20px; /* Adjusted width */
  height: 20px; /* Adjusted height */
`;

const Div12 = styled.div`
  font-family: Poppins, sans-serif;
`;

const Div13 = styled.div`
  letter-spacing: 0.45px;
  font: 15px Poppins, sans-serif;
`;

const ButtonStyled = styled.button`
  justify-content: center;
  align-items: center;
  border-radius: 12px;
  box-shadow: 0px 4px 10px 0px rgba(233, 68, 75, 0.25);
  background-color: #FD3B3B;
  margin-top: 20px; /* Adjusted margin-top */
  color: #fff;
  letter-spacing: 0.96px;
  padding: 15px 40px; /* Adjusted padding */
  font: 22px Poppins, sans-serif; /* Adjusted font size */
  border: none;
  cursor: pointer;
`;
