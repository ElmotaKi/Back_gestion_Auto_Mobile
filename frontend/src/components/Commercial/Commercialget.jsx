import { useState, useEffect } from 'react';
import axios from 'axios';

function CommercialComponent() {
  const [commercials, setcommercials] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('http://localhost:8000/api/commercials');
        console.log(response.data);
        setcommercials(response.data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    fetchData();
  }, []);

  return (
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>CIN</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Sexe</th>
          <th>Date naissance</th>
          <th>Tel</th>
          <th>Adresse</th>
          <th>Ville</th>
        </tr>
      </thead>
      <tbody>
        {commercials.map((commercial) => (
          <tr key={commercial.id}>
            <td>{commercial.id}</td>
            <td>{commercial.CIN}</td>
            <td>{commercial.Nom}</td>
            <td>{commercial.Prenom}</td>
            <td>{commercial.Sexe}</td>
            <td>{commercial.DateNaissance}</td>
            <td>{commercial.Tel}</td>
            <td>{commercial.Adresse}</td>
            <td>{commercial.Ville}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
}

export default CommercialComponent;
